<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobSeeker;
use App\User;
use DB;

class JobSeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('user_type_id', 1)->where('is_active', 0)->get();
        $number = 1;

        return view('admin.seekers.index', compact(['users', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seekers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->is_active = 0;
        $user->user_type_id = 1;
        $user->password = $request->input('password');
        $user->save();

        if($request->hasFile('profileImage')){
            $file = $request->file('profileImage');
            $fileExt = $file->getClientOriginalExtension();

            $newFileName = $user->id . '-' .time() . '.' . $fileExt;

            $destinationPath = 'users/';

           if($user->image) {
               unlink(public_path('uploads/' . $destinationPath . $user->image));
            }
            
            $file->storeAs($destinationPath, $newFileName, 'uploads');

            $user->image = $newFileName;
            $user->save();
        }

        $seeker = new JObSeeker;

        $seeker->user_id = $user->id;
        $seeker->hourly_rate = $request->input('hourly_rate');
        $seeker->work_time_start = $request->input('work_time_start');
        $seeker->work_time_end = $request->input('work_time_end');

        $seeker->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
       
        $user = User::findOrFail($user);
        return view('admin.seekers.show',compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $user = User::findOrFail($user);
        return view('admin.seekers.edit', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->is_active = $request->input('is_active');
        $user->user_type_id = 1;
        $user->password = $request->input('password');
        $user->save();

        if($request->hasFile('profileImage')){
            $file = $request->file('profileImage');
            $fileExt = $file->getClientOriginalExtension();

            $newFileName = $user->id . '-' .time() . '.' . $fileExt;

            $destinationPath = 'users/';

           if($user->image) {
               unlink(public_path('uploads/' . $destinationPath . $user->image));
            }
            
            $file->storeAs($destinationPath, $newFileName, 'uploads');

            $user->image = $newFileName;
            $user->save();
        }

        return redirect('admin/seekers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $seeker = JobSeeker::where('user_id', $user)->delete();

        $user = User::findOrFail($user)->delete();


        return redirect()->back();
    }
}
