<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobCategory;
use Illuminate\Support\Facades\Session;

class JobCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobCategories = JobCategory::all();
        $number = 1;

        return view('admin.job-categories.index', compact('jobCategories', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobCategories = new JobCategory;

        $this->validate($request,[
                      'title' => 'required|unique:job_categories|max:100',
                  ],[
                      'title.required' => ' The job category title field is required.',
                      'title.max' => ' The job category title may not be greater than 100 characters.',
                      'title.unique' => ' It seems job category title already exist',
                  ]);

        $jobCategories->title = $request->input('title');
        $jobCategories->description = $request->input('description');
        $jobCategories->is_active = $request->input('is_active');
        $jobCategories->created_by = auth()->user()->id;

        Session::flash('success','Job Category Successfully Added');

        $jobCategories->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(JobCategory $jobCategory)
    {
        //dd($jobCategory->user->name);
        return view('admin.job-categories.show', compact(['jobCategory']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCategory $jobCategory)
    {
        return view('admin.job-categories.edit', compact(['jobCategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobCategory $jobCategory)
    {
         $this->validate($request,[
                      'title' => 'required|unique:job_categories|max:100',
                  ],[
                      'title.required' => ' The job category title field is required.',
                      'title.max' => ' The job category title may not be greater than 100 characters.',
                      'title.unique' => ' It seems job category title already exist',
                  ]);

        $jobCategory->title = $request->input('title');
        $jobCategory->description = $request->input('description');
        $jobCategory->is_active = $request->input('is_active');
        $jobCategory->updated_by = auth()->user()->id;

        Session::flash('update','Job Category Successfully Updated');

        $jobCategory->save();
        return redirect('admin/job-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        Session::flash('delete','Job Category Successfully delete');
        return redirect('admin/job-categories');
    }
}
