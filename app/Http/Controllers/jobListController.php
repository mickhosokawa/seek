<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\PrimaryCategory;
use App\Models\Classification;
use App\Models\Company\JobOffer;

class JobListController extends Controller
{

    public function index()
    {
        $classifications = Classification::all();

        return view('seek.index', compact('classifications'));

    }

    public function search(Request $request)
    {
        $classifications = Classification::all();
        //dd($classifications);
        $sort         = $request->get('sort');
        $jobs         = DB::table('jobs');
        
        // 入力された内容を取得
        $search = $request->get('search');
        $query = $jobs
                ->leftJoin('classifications', 'jobs.job_id', '=', 'classifications.id');

        // keywordが入力されていれば、AND検索を実行
        if($search){
            $spaceConvert = mb_convert_kana($search, 's');
            $searchKeyWords = preg_split('/[\s,]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

            foreach($searchKeyWords as $searchKeyWord){
                $query->where('position', 'LIKE', "%{$searchKeyWord}%");
            }
        }
        
        // 並び替え
        if(!empty($sort)){
            if($sort === 'relevance'){
                $query->orderBy('jobs.id', 'asc');
            }else{
                $query->orderBy('jobs.created_at', 'desc');
            }
        }else{
            $query->orderBy('jobs.id', 'asc');
        }

        // カテゴリ検索
        if(isset($classifications)){
            $query->where('classifications.id','=',$request->input('id'));
        }
        //dd($query);
        
        $jobs = $query->get();
    
        return view('seek.jobs', compact('jobs', 'search', 'classifications'));
    }

    public function show($id)
    {
        $detail = JobOffer::findOrFail($id);

        return view('seek.jobDetail', compact('detail'));
    }
}
