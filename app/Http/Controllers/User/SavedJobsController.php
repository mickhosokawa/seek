<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SavedJob;
use App\Models\User;
use App\Models\JobOffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SavedJobsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alreadyLiked = SavedJob::where('user_id', Auth::user()->id)->where('job_offer_id', $request->job_offer_id)->exists();
        $jobOfferId = $request->input('job_offer_id');
        $regiStatus = '';
        $param = [];

        if($this->isLogin()){
            if(!$alreadyLiked){
                $regiStatus = 'add';
                $user = Auth::user()->id;
                $saveJob = SavedJob::create([
                    'user_id' => $user, 
                    'job_offer_id' => $jobOfferId
                ]);
                $saveJob->save();
            }else{
                SavedJob::where('user_id', Auth::user()->id)->where('job_offer_id', $jobOfferId)->delete();
                $regiStatus = 'remove';
            }
        }else{
            return redirect('login');
        }
        $param = [
            'job_offer_id' => $jobOfferId,
            'status' => $regiStatus,
            ];
            
        return response()->json($param);
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobOffer $jobOffer, Request $request)
    {
        $user = Auth::user()->id;
        $nice = SavedJob::where('job_offer_id', $jobOffer->id)->where('user_id', $user)->first();
        $nice->destroy();
    }

    public function isLogin(){
        if(Auth::check()){
            return true;
        }else{
            return false;
        }
    }
}
