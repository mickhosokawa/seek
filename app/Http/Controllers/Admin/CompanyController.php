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
        $this->middleware('auth:admin');

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
        $companies = Company::get();

        return view('admin.companies.index', compact('companies'));
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

        // 企業リスト画面にリダイレクト
        return redirect()->route('admin.companies.index');
    }

    /**
     *Search companies with keywords
     *  
     */
    public function search(Request $request)
    {
        // 入力された内容を取得
        $keywords = $request->input('keywords');

        // クエリビルダ
        // $company_list = DB::table('companies');
        $query = DB::table('companies');
                // ->select('companies.name', 'companies.email',)
                // ->leftJoin('human_resources', 'companies.id', '=', 'human_resources.companies_id');

        // keywordが入力されていれば、AND検索を実行
        if(!empty($keywords)){
            $spaceConvert = mb_convert_kana($keywords, 's');
            $searchKeyWords = preg_split('/[\s,]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

            foreach($searchKeyWords as $searchKeyWord){
                $query->where('name', 'LIKE', "%{$searchKeyWord}%");
            }
        }

        $companies = $query->orderBy('created_at', 'asc')->get();
        //dd($companies);

        return view('admin.companies.index', compact('companies'));
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
        // エロクアントで企業テーブルの情報を取得
        $company = Company::withTrashed()->findOrFail($id);

        // クエリビルダで人事テーブルの情報を取得
        // $human_resource = DB::table('human_resources')
        //                     ->where('companies_id', $id)
        //                     ->first();
        // dd($human_resource);
        return view('admin.companies.edit', compact('company'));
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
        $company_info = Company::findorFail($id);
        
        $company_info->name = $request->name;
        $company_info->email = $request->email;

        $company_info->save();

        // 企業リスト画面にリダイレクト
        return redirect()->route('admin.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::findOrFail($id)->delete();
        
        return redirect()->route('admin.companies.index');
    }
}
