<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JobOffer;
use App\Models\PrimaryCategory;
use App\Models\Classification;
use App\Models\SubClassification;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        $classifications = Classification::all();
        //$sort         = $request->get('sort');
        //$jobs         = DB::table('jobs');
        $jobOffers = JobOffer::with(['SubClassification', 'suburb.state'])->get();

        // 入力された内容を取得
        $search = $request->input('search');
        $subClassification = $request->input('sub_classification');
        //dd($search, $subClassification, $request);

        // keywordが入力されていれば、AND検索を実行
        // if($search){
            $spaceConvert = mb_convert_kana($search, 's');
            $searchKeyWords = preg_split('/[\s,]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

            foreach($searchKeyWords as $searchKeyWord){
                $jobOffers = JobOffer::where('title', 'LIKE', "%{$searchKeyWord}%")
                                        //->where('sub_classification_id','=',$subClassification)
                                        ->with(['suburb'])
                                        ->get();
                                        //->toArray();
            }
            //dd($jobOffers);
        // }
        //dd($search, $searchKeyWords, $jobOffers);

        
        // 並び替え
        // if(!empty($sort)){
        //     if($sort === 'relevance'){
        //         $query->orderBy('jobs.id', 'asc');
        //     }else{
        //         $query->orderBy('jobs.created_at', 'desc');
        //     }
        // }else{
        //     $query->orderBy('jobs.id', 'asc');
        // }

        // カテゴリ検索
        if($subClassification){
            // $jobOffers = 
            // $jobOffers = JobOffer::where('sub_classification_id','=',$subClassification)
            //                         ->where('title', 'LIKE', "%{$searchKeyWords}%")
            //                         ->with('SubClassification')
            //                         ->get()
            //                         ->toArray();
        }
        

        return view('seek.index', compact('classifications','jobOffers', 'search'));

    }

    public function search(Request $request)
    {
        //$classifications = Classification::all();
        

    
        //return view('seek.jobs', compact('jobs', 'search', 'classifications'));
    }

    public function show($id)
    {
        $detail = JobOffer::findOrFail($id);

        return view('seek.jobDetail', compact('detail'));
    }
}
