<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;
use App\JobCategory;

class JobPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobPosts = JobPost::all();
        $number = 1;
        return view('admin.job-posts.index', compact(['jobPosts', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobCategories = JobCategory::all();
        return view('admin.job-posts.create', compact(['jobCategories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobPost = new JobPost;

        $jobPost->job_category_id = $request->input('job_category_id');
        $jobPost->title = $request->input('title');
        $jobPost->description = $request->input('description');
        $jobPost->payment_amount = $request->input('payment_amount');
        $jobPost->working_date_time = $request->input('working_date_time');
        $jobPost->required_employee = $request->input('required_employee');
        $jobPost->is_active = $request->input('is_active');

        $jobPost->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
        return view('admin.job-posts.show', compact(['jobPost']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobPost)
    {
        $jobCategories = JobCategory::all();
        return view('admin.job-posts.edit', compact(['jobPost', 'jobCategories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPost $jobPost)
    {
        $jobPost->job_category_id = $request->input('job_category_id');
        $jobPost->title = $request->input('title');
        $jobPost->description = $request->input('description');
        $jobPost->payment_amount = $request->input('payment_amount');
        $jobPost->working_date_time = $request->input('working_date_time');
        $jobPost->required_employee = $request->input('required_employee');
        $jobPost->is_active = $request->input('is_active');

        $jobPost->save();
        return redirect('admin/job-posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        return redirect('admin/job-posts');
    }
}
