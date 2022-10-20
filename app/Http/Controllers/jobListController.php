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
        $categories   = $category->getLists();

        return view('seek.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $category     = new primaryCategory;
        $categories   = $category->getLists();
        $category_ids = $request->input('category_ids');
        $sort         = $request->get('sort');
        $jobs         = DB::table('jobs');
        
        // 入力された内容を取得
        $search = $request->get('search');
        
        $query = $jobs
                ->leftJoin('primary_categories', 'jobs.job_id', '=', 'primary_categories.id')
                ->where('position', 'LIKE', "%{$search}%");
        
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
