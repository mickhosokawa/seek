<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\PrimaryCategory;

class JobListController extends Controller
{

    public function index()
    {
        $category     = new PrimaryCategory;
        $categories = PrimaryCategory::pluck('name', 'id');

        return view('seek.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $category     = new primaryCategory;
        $categories = PrimaryCategory::pluck('name', 'id');
        $category_ids = $request->input('category_ids');
        $sort         = $request->get('sort');
        $jobs         = DB::table('jobs');
        
        // 入力された内容を取得
        $search = $request->get('search');
        $query = $jobs
                ->leftJoin('primary_categories', 'jobs.job_id', '=', 'primary_categories.id');

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
        if(isset($category_ids)){
            $query->where('primary_categories.id', $category_ids);
        }
        
        $jobs = $query->get();
    
        return view('seek.jobs', compact('jobs', 'search', 'category_ids', 'categories'));
    }

    public function show($id)
    {
        $detail = Job::findOrFail($id);

        return view('seek.jobDetail', compact('detail'));
    }
}
