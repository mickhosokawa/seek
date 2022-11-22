<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ProfileFirstRequest;
use App\Http\Requests\Company\SecondPostRequest;
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
        //dd('aaa');
        $awards = AwardsAndAccreditations::where('company_id', '=', Auth::id())
                                    ->orderBy('id', 'asc')
                                    ->get();
        $awardTest = AwardsAndAccreditations::where('company_id', '=', Auth::id())->orderBy('id', 'asc');
        dd($awardTest->toSql(), $awardTest->getBindings());
        $cultures = CultureAndValues::where('company_id', '=', Auth::id())
                                ->orderBy('id', 'asc')
                                ->get();

        $benefits = Benefits::where('company_id', '=', Auth::id())
                                ->orderBy('id', 'asc')
                                ->get();
        
        return view('company.profile.second', compact('awards', 'cultures', 'benefits'));
    }

    public function secondPost(SecondPostRequest $request)
    {
        //dd('bbb');
        // 入力値の取得(画像ファイル以外)
        $secondPost = $request->except('awardImage'); // 受賞タイトル、福利厚生タイトル/詳細、文化と価値タイトル/詳細

        // 画像ファイルを取得
        $onlyImage = $request->file('awardImage'); // 画像ファイル情報(name="awardImage")
        
        //dd($request);
        $test = $request->validated();
        
        // DBに保存する画像ファイル名を作成する
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
            session()->put('file_name', $filePath);
        }else{

        }
        
        // セッションに保存(画像ファイル以外)
        session()->put('except_image', $secondPost);
        
        // 確認画面に移動
        return redirect()->route('company.profile.confirm');
    }
    
    public function confirm(SecondPostRequest $request)
    {
        dd('error in confirm');
        $key = $request->session()->get('key');
        $exceptImageFile = $request->session()->get('except_image');
        $imageFileName = $request->session()->get('file_name');
        $imageFile = $request->session()->get('image_file');

        dd($exceptImageFile['awardTitle']);
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
        dd('error in store method');
        // インスタンス生成
        $award = new AwardsAndAccreditations();
        $culture = new CultureAndValues();
        $benefit = new Benefits();

        $basicInfo = $request->session()->get('key'); // companiesテーブルの内容 
        $exceptImageInfo = $request->session()->get('except_image'); // 受賞タイトル、文化と価値、福利厚生テーブル
        $imagePath = $request->session()->get('file_name'); // ファイルパスを取得
        $test[] = '';

        // 登録処理
        DB::transaction(function() use($basicInfo, $exceptImageInfo, $imagePath, $award, $culture, $benefit, $test){
            // Companyテーブルの更新
            // 文字列の先頭、末尾の余白を削除
            Company::where('id', '=', Auth::id())->update([
                'name' => trim($basicInfo['name']),
                'email' => trim($basicInfo['email']),
                'address' => trim($basicInfo['address']),
                'phone_number' => trim($basicInfo['phone_number']),
                'url' => trim($basicInfo['url']),
                'industry' => trim($basicInfo['industry']),
                'company_size' => trim($basicInfo['company_size']),
                'specialities' => trim($basicInfo['speciality']),
                'our_mission_statement' => trim($basicInfo['mission']),
                'featured' => trim($basicInfo['featured']),
                'other' => trim($basicInfo['other']),
            ]);
            
            // 受賞タイトルテーブルを更新
            if(!empty($exceptImageInfo['awardTitle'])){
                foreach($exceptImageInfo['awardTitle'] as $awardTitle){
                    foreach ($imagePath as $fileName) {
                        $award->company_id = Auth::id();
                        $award->title = $awardTitle;
                        $award->image = $fileName;
                    }
                }
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
