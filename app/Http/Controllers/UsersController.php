<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

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
}
