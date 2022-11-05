<?php

namespace App\Http\Controllers\Company;

use App\Enums\JobType;
use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\Suburb;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostJobsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:company');
    }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_types = JobType::cases();
        $suburbs = Suburb::get();
        $classifications = Classification::with('subClassification')->get();

        return view('company.post', compact('job_types', 'suburbs', 'classifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * 受け取ったリクエストのバリデーション
         * フラッシュメッセージ
         *  */ 
        $validated = $request->validate([
            'title' => 'required|min:10|max:100',
            'suburb' => 'required',
            'sub_classification' => 'required',
            'annual_salary' => 'required|min:0',
            'hourly_pay' => 'required|min:0',
            'job_type' => 'required',
            'description' => 'required|min:100|max:1000',
        ]);

        if($validated){
            $message_key = 'success_message';
            $flash_message = 'Post has been successful';
        }else{
            $message_key = 'error_message';
            $flash_message = 'You should follow bellow messages.';
        }
        
        // Validatorを使ったバリデーション 
        // $message_key = '';
        // $flash_message = '';

        // $validator = Validator::make($request->all(), 
        // [
        //     'title' => 'required|min:11|max:100',
        //     'suburb' => 'required',
        //     'sub_classification' => 'required',
        //     'annual_salary' => 'required|min:0',
        //     'hourly_pay' => 'required|min:0',
        //     'job_type' => 'required',
        //     'description' => 'required|min:100|max:1000',
        // ]);

        // if($validator->fails()){
        //     $message_key = 'error_message';
        //     $flash_message = 'You should follow bellow messages.';
            
        //     return redirect(route('company.post.job.create'))
        //         ->withErrors($validator, )
        //         ->withInput();
        // }else{
        //     $message_key = 'success_message';
        //     $flash_message = 'Post has been successful';

        //     return redirect()->route('company.post.job.create')->with($message_key, $flash_message);
        // }
        
        DB::transaction(function () use($request){
            JobOffer::create([
                'company_id' => Auth::id(),
                'title' => $request->title,
                'suburb_id' => $request->suburb,
                'sub_classification_id' => $request->sub_classification,
                'annual_salary' => $request->annual_salary,
                'hourly_pay' => $request->hourly_pay,
                'job_type' => $request->job_type,
                'description' => $request->description,
                'is_display' => $request->is_display,
            ]);
        });

        return redirect()->route('company.post.job.create')->with($message_key, $flash_message);
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
