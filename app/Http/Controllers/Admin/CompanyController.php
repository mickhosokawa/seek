<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\HumanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->company = new Company;
        $this->human_resource = new HumanResource;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $name = $request->name;
            $email = $request->email;
            $password = Hash::make($request->password);

            /**
             * 人事テーブル作成前に企業アカウントが登録できてしまうため、
             * 企業アカウントが登録成功し、人事テーブルが登録失敗の場合、
             * 正しい登録ができない。
             * 
             * 人事テーブルが登録成功した場合のみ、
             */
            // 企業情報を先に登録する
            $company = $this->company->createCompanyInfo($name, $email, $password);
            
            // 企業情報に登録したidを取得する
            $company_id = $company->id;

            // 人事テーブルにidとパスワードを登録する
            $this->human_resource->createHrInfo($company_id, $email, $password);
        }catch(Exception $e){
            DB::rollback();
        }
    }

    /**
     *Search companies with keywords
     *  
     */
    public function search(Request $request)
    {
        $companies = new Company;
        $human_resources = new HumanResource;
        $keywords = $request->input('keywords');

        return view('admin.companies.index', compact('keywords'));
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
