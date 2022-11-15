<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\ProfileFirstRequest;
use Illuminate\Validation\Validator;
use App\Models\Company;
use App\Models\Company\AwardsAndAccreditations;
use Illuminate\Support\Facades\Auth;


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
        // if(is_null($request->pageFlag)){
        //     return view('company.profile.create');
        // }else{
        //     //dd($request->pageFlag);
        //     return view('company.profile.create');
        // }
        return view('company.profile.first');
    }

    public function firstPost(ProfileFirstRequest $request)
    {
        // 入力値の取得
        $first_post = $request->all();

        // 入力チェック
        $is_validated = $request->validated();

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
        //dd($request->awardImage);
        // 入力値の取得
        $second_post = $request->all(); // ここがダメっぽいです。

        // 画像の保存先
        $dir = 'img';

        // セッションに保存
        $request->session()->put('key2', $second_post);
        //dd($second_post);

        // 次の入力画面に移動
        return redirect()->route('company.profile.confirm');
    }
    
    public function confirm(Request $request)
    {
        $input = $request->session()->get('key');
        $input2 = $request->session()->get('key2');

        if(!$input || !$input2){
            return redirect()->route('company.profile.create');
        }
        //var_dump($input);
        return view('company.profile.confirm', compact('input', 'input2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->session()->get('key');
        $input2 = $request->session()->get('key2');
        dd($input2->awardImage, 'aaaaaaaaaaa');

        // 登録処理
        DB::transaction(function() use($request){
            foreach($request->title as $title){
                if(!isset($title->awardImage)){ $title->awardImage = null; }
                AwardsAndAccreditationsDB::create([
                    'company_id' => Auth::id(),
                    'title' => $title->awardTitle,
                    'image' => $title->awardImage,
                ]);
            }
        });
        // セッションを空にする
        $forget = $request->session()->forget('key');
        $forget2 = $request->session()->forget('key2');

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
