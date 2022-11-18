<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ProfileFirstRequest;
use Illuminate\Validation\Validator;
use App\Models\Company;
use App\Models\Company\AwardsAndAccreditations;
use App\Models\Company\Benefits;
use App\Models\Company\CultureAndValues;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        //
        $company = Company::where('id', '=', Auth::id())->first();
        //dd($company);

        return view('company.profile.first', compact('company'));
    }

    public function firstPost(ProfileFirstRequest $request)
    {
        
        // 入力値の取得
        $first_post = $request->all();

        // 入力チェック
        $is_validated = $request->validated();
        //dd($is_validated);

        // フラッシュメッセージ
        if($is_validated){
            
            // セッションに保存
            $request->session()->put('key', $first_post);
            
            return redirect()->route('company.profile.createSecond');
        }else{
            $message_key = 'error_message';
            $flash_message = 'You should follow bellow messages.';

            return redirect()->route('company.profile.create')->with($message_key, $flash_message);
        }
    }

    public function createSecond(Request $request)
    {
        return view('company.profile.second');
    }

    public function secondPost(Request $request)
    {
        // 入力値の取得(画像ファイル以外)
        $secondPost = $request->except('awardImage'); // 受賞タイトル、福利厚生タイトル/詳細、文化と価値タイトル/詳細

        // 画像ファイルを取得
        $onlyImage = $request->file('awardImage'); // 画像ファイル情報(name="awardImage")
        
        // 画像自体セッションい保存しようとしたが、Serialization of 'Illuminate\Http\UploadedFile' is not allowed
        // 画像を先に保存しておき、セッションにはファイルパスのみ保持するようにした
        // ※途中で入力を止めたり、上手く登録できなかった場合の処理は考慮されていないため、
        // その処理も加える必要がある。現時点では未実装
        if($onlyImage){
            foreach($onlyImage as $fileName){
                // 画像ファイル名を取得
                $path = $fileName->getClientOriginalName();
                // セッションにファイル名を保存
                $filePath[] = $path;
            
                // 取得したファイル名でawardImg直下に画像を保存
                $result = $fileName->storeAs('awardImg', $path);
            }
            // セッションに保存(画像のファイル名)
            // dd($filePath);
            session()->put('file_name', $filePath);
        }

        // セッションに保存(画像ファイル以外)
        session()->put('except_image', $secondPost);
        
        // 確認画面に移動
        return redirect()->route('company.profile.confirm');
    }
    
    public function confirm(Request $request)
    {
        $key = $request->session()->get('key');
        $exceptImageFile = $request->session()->get('except_image');
        $imageFileName = $request->session()->get('file_name');
        $imageFile = $request->session()->get('image_file');

        //dd($exceptImageFile['awardTitle']);
        return view('company.profile.confirm', compact('key', 'exceptImageFile', 'imageFileName', 'imageFile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // インスタンス生成
        $award = new AwardsAndAccreditations();
        $culture = new CultureAndValues();
        $benefit = new Benefits();

        $basicInfo = $request->session()->get('key'); // companiesテーブルの内容 
        $exceptImageInfo = $request->session()->get('except_image'); // 受賞タイトル、文化と価値、福利厚生テーブル
        $imagePath = $request->session()->get('file_name'); // ファイルパスを取得
        //dd($basicInfo);

        // 登録処理
        DB::transaction(function() use($basicInfo, $exceptImageInfo, $imagePath, $award, $culture, $benefit){
            // Companyテーブルの更新
            Company::where('id', '=', Auth::id())->update([
                'name' => $basicInfo['name'],
                'email' => $basicInfo['email'],
                'password' => 'password',
                'address' => $basicInfo['address'],
                'phone_number' => $basicInfo['phone_number'],
                'url' => $basicInfo['url'],
                'industry' => $basicInfo['industry'],
                'company_size' => $basicInfo['company_size'],
                'specialities' => $basicInfo['speciality'],
                'our_mission_statement' => $basicInfo['mission'],
                'featured' => $basicInfo['featured'],
                'other' => $basicInfo['other'],
            ]);
            
            // 受賞タイトルテーブルを更新
            if(!empty($exceptImageInfo['awardTitle'])){
                foreach($exceptImageInfo['awardTitle'] as $awardTitle){
                    foreach($imagePath as $awardImage){
                        $award->company_id = Auth::id();
                        $award->title = $awardTitle;
                        $award->image = $awardImage;
                    }
                }
                //dd($awardImage);
            }
            $award->save();

            // 文化と価値テーブルを更新
            if(isset($exceptImageInfo['cultureTitle'])){
                foreach($exceptImageInfo['cultureTitle'] as $cultureTitle){
                    foreach($exceptImageInfo['cultureDetail'] as $cultureDetail){
                        $culture->company_id = Auth::id();
                        $culture->title = $cultureTitle;
                        $culture->detail = $cultureDetail;
                    }
                }
            }
            $culture->save();

            // 福利厚生テーブルを更新 
            if(isset($exceptImageInfo['benefitTitle'])){
                foreach($exceptImageInfo['benefitTitle'] as $benefitTitle){
                    foreach($exceptImageInfo['benefitDetail'] as $benefitDetail)
                        $benefit->company_id = Auth::id();
                        $benefit->title = $benefitTitle;
                        $benefit->detail = $benefitDetail;
                }
            }
            $benefit->save();
        });

        // セッションを空にする
        $request->session()->forget('key');
        $request->session()->forget('except_image');
        $request->session()->forget('file_name');
        $request->session()->forget('image_file');        

        return redirect()->route('company.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
