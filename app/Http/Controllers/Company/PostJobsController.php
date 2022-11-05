<?php

namespace App\Http\Controllers\Company;

use App\Enums\JobType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Classification;
use App\Models\Suburb;
use App\Models\JobOffer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
