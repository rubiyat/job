<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $number = 1;

        return view('admin.users.index', compact(['users', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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

        $this->validate($request,[
                      'email' => 'required|unique:users|max:100',
                      'password' => 'required|min:6',
                  ],[
                      'email.required' => ' The user email field is required.',
                      'email.unique' => ' It seems user email already exist',
                      'password.required' => ' The password field is required.',
                      'password.min' => ' The password field must be 6 digit .',
                  ]);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_active = $request->input('is_active');
        $user->interested_role = $request->input('interested_role');
        $user->password = $request->input('password');

        Session::flash('success','User Successfully Added');

        $user->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
          $this->validate($request,[
                      'email' => 'required|unique:users|max:100',
                      'password' => 'required|min:6',
                  ],[
                      'email.required' => ' The user email field is required.',
                      'email.unique' => ' It seems user email already exist',
                      'password.required' => ' The password field is required.',
                      'password.min' => ' The password field must be 6 digit .',
                  ]);


        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_active = $request->input('is_active');
        $user->interested_role = $request->input('interested_role');
        $user->password = bcrypt($request->input('password'));

        Session::flash('update','User Successfully Updated');

        $user->save();
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('delete','User Successfully Delete');
        return redirect('admin/users');
    }

    public function userProfile(User $user) {
        return view('admin.users.profile', compact(['user']));
    }

    public function updateProfile(Request $request, User $user) {

        if($request->input('updateProfileBtn') === "Update Profile Info") {
            $updateAction = $this->updateProfileInfo($request, $user);
        }elseif ($request->input('updateProfileBtn') === "Update Profile Password") {
            $updateAction = $this->updateProfilePassword($request, $user);
        }elseif ($request->input('updateProfileBtn') === "Update Profile Image") {
            $updateAction = $this->updateProfileImage($request, $user);
        }

        return back();
    }

    protected function updateProfileInfo($request, $user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');

        return $user->save();
    }

    protected function updateProfilePassword($request, $user) {

        // if(Hash::check($request->input('old_password'), $user->password)) {
        //     $user->password = Hash::make($request->input('password'));
        //     return $user->save();
        // } else {
        //     dd('Password Not Matched');
        // }     
        

        $user->password = Hash::make($request->input('password'));
        return $user->save();          
        
    }

    protected function updateProfileImage($request, $user) {
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
    }
}
