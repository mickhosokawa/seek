<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Models\Classification;
use App\Models\Job;
use App\Models\Suburb;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        // マスタデータの取得
        $classifications = Classification::all();
        $suburbs = Suburb::all();
        
        // 求人情報一覧の取得
        $jobOffers = JobOffer::with(['SubClassification', 'suburb.state']);

        // お気に入り登録済みかどうか
        
        // 検索内容を取得
        $search = $request->input('search');
        $subClassification = $request->input('sub_classification');
        $suburb = $request->input('suburb');
        // $sort = $request->input('sort');
        
        // キーワード検索
        if($search){
            $spaceConvert = mb_convert_kana($search, 's');
            $searchKeyWords = preg_split('/[\s,]+/', $spaceConvert, -1, PREG_SPLIT_NO_EMPTY);

            if($search){
                foreach($searchKeyWords as $searchKeyWord){
                    $jobOffers->where('title', 'LIKE', "%{$searchKeyWord}%");
                }
            }
        }
        // 職種検索
        if($subClassification != 0){
            $jobOffers->where('sub_classification_id', '=', $subClassification);
        }

        // 場所検索
        if($suburb != 0){
            $jobOffers->where('suburb_id', '=', $suburb);
        }

        // 並び替え
        // if(!empty($sort)){
        //     if($sort === 'relevance'){
        //         $jobOffers->orderBy('id', 'asc');
        //     }else{
        //         $jobOffers->orderBy('created_at', 'desc');
        //     }
        // }else{
        //     $jobOffers->orderBy('id', 'asc');
        // }

        $jobOffers = $jobOffers->get();

        return view('seek.index', compact('classifications', 'suburbs', 'jobOffers', 'search'));
    }

    public function show($id)
    {
        $detail = JobOffer::findOrFail($id);

        return view('seek.jobDetail', compact('detail'));
    }

}
