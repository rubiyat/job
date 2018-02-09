<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserType;
use Illuminate\Support\Facades\Session;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userTypes = UserType::all();
        $number = 1;
        return view('admin.user-types.index', compact(['userTypes', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userType = new userType;
        
        $userType->name = $request->input('name');
        $userType->description = $request->input('description');
        $userType->is_active = $request->input('is_active');

        $userType->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        return view('admin.user-types.show', compact(['userType']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserType $userType)
    {
        return view('admin.user-types.edit', compact(['userType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $userType)
    {
        $userType->name = $request->input('name');
        $userType->description = $request->input('description');
        $userType->is_active = $request->input('is_active');

        $userType->save();
        return redirect('admin/user-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $userType)
    {
        $userType->delete();
        Session::flash('delete','User Type Successfully Delete');
        return redirect('admin/user-types');
    }
}
