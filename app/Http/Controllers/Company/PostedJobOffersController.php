<?php

namespace App\Http\Controllers\Company;

use App\Enums\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\JobOffer;
use App\Models\SubClassification;
use App\Models\Suburb;
use Throwable;
use Illuminate\Support\Facades\Log;

class PostedJobOffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postedJobOffers = '';

        // 求人情報の有無を判定
        if(JobOffer::where('company_id', '=', Auth::id())->exists()){
            $postedJobOffers = JobOffer::where('company_id', '=', Auth::id())->get();
        }else{
            $postedJobOffers = null;
        }

        return view('company.jobs.index', compact(('postedJobOffers')));
    }

    // show()は使わない可能性あり
    public function show($id)
    {
        $jobOfferDetail = JobOffer::findOrFail($id);

        return view('company.jobs.show', compact('jobOfferDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 選択したidから求人情報を取得
        $jobOffer = JobOffer::find($id);

        // 各種マスタの取得
        $suburbs = Suburb::all();
        $classifications = Classification::all();
        $subClassifications = SubClassification::all();
        $jobTypes = JobType::cases();
        
        return view('company.jobs.edit', compact('jobOffer', 'suburbs', 'classifications', 'subClassifications', 'jobTypes'));
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
        // DB更新処理
        try{
            DB::transaction(function () use($request, $id){
                JobOffer::where('id', '=', $id)
                    ->update([
                        'title' => $request->title,
                        'suburb_id' => $request->suburb,
                        'sub_classification_id' => $request->sub_classification,
                        'annual_salary' => $request->annual_salary,
                        'hourly_pay' => $request->hourly_pay,
                        'job_type' => $request->job_type,
                        'description' => $request->description,
                        'is_display' => $request->is_display,
                        'sort_no' => $request->sort_no,
                    ]);
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }

        return redirect()
        ->route('company.job.edit',['id' => $id])
        ->with('update_message', 'Update is successed!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $targetJobOffer = JobOffer::findOrFail($id);

        $targetJobOffer->delete();

        return redirect()
        ->route('company.dashboard')
        ->with('delete_message', 'Post is deleted.');
    }
}
