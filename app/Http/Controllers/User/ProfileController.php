<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DateTimeRequest;
use App\Models\User;
use App\Models\CareerHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Type\Integer;
use Throwable;

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

    /**
     * ユーザー基本情報入力画面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', '=', Auth::id())->first();

        return view('user.profile.personalDetail', compact('user'));
    }

    /**
     * ユーザー基本情報登録
     */
    public function storePersonalDetail(Request $request)
    {
        $personalDetail = $request->all();

        // 登録処理
        DB::transaction(function () use($personalDetail){
            User::where('id', '=', Auth::id())->update([
                'first_name' => $personalDetail['first_name'],
                'last_name' => $personalDetail['last_name'],
                'email' => $personalDetail['email'],
                'address' => $personalDetail['address'],
                'phone_number' => $personalDetail['phone_number'],
                'personal_summary' => $personalDetail['personal_summary'],
            ]);
        });

        return redirect()->route('user.profile.create')->with('flash_message', 'Success your profile!');
    }

    /**
     * 職歴入力画面
     */
    public function createCareer()
    {
        $careers = CareerHistory::where('user_id', '=', Auth::id())->get();
        $current_year = Carbon::now()->year;

        return view('user.profile.career', compact('careers', 'current_year'));
    }

    /**
     * 
     * 経歴入力バリデーション、保存
     * 
     */
    public function storeCareer(Request $request)
    {
        //$started_date = date('Y/m', $request->started_year.$request->started_month);
        //$ended_date = date('Y/m', $request->ended_year.$request->ended_month);

        //dd($started_date, $ended_date,date('Y/m', $started_date));

        // if($started_date < $ended_date){
        //     dd('test');
        // }else{
        //     dd('成功');
        // }

        // バリデーション
        $validated = $request->validate([
            'job_title' => 'required',
            'company_name' => 'required',
            'started_year' => 'required',
            'started_month' => 'required',
            // 'ended_year' => 'required',
            // 'ended_month' => 'required',
        ]);

        if($request->role === '1'){
            $role = true;
        }else{
            $role = false;
        }
        //dd(gettype((int)$request->started_year), $request->started_year);
        try{
            DB::transaction(function() use($request, $role){
                CareerHistory::create([
                    'user_id' => Auth::id(),
                    'role' => $role,
                    'job_title' => $request->job_title,
                    'company_name' => $request->company_name,
                    'started_year' => (int)$request->started_year,
                    'started_month' => (int)$request->started_month,
                    'ended_year' => (int)$request->ended_year,
                    'ended_month' => (int)$request->ended_month,
                    'description' => $request->description,
                ]);
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }
        return redirect()->route('user.profile.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $career = CareerHistory::findOrFail($id);
        $current_year = Carbon::now()->year;

        return view('user.profile.edit', compact('career', 'current_year'));
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
        $update = CareerHistory::findOrFail($id);

        //dd($update, $update->role, $request->role, $request->all(), $role);
        $update->role = $request->role;
        $update->job_title = $request->job_title;
        $update->company_name = $request->company_name;
        $update->started_year = $request->started_year;
        $update->started_month = $request->started_month;
        $update->ended_year = $request->ended_year;
        $update->ended_month = $request->ended_month;
        $update->description = $request->description;

        $update->save();

        return redirect()->route('user.profile.career.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = CareerHistory::findOrFail($id);

        $career->delete();

        return redirect()->route('user.profile.career.create');
    }
}
