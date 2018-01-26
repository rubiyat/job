<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Session;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        $number = 1;

        return view('admin.roles.index', compact(['roles', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;

        $this->validate($request,[
                      'name' => 'required|unique:roles|max:100',
                  ],[
                      'name.required' => ' The role name field is required.',
                      'name.max' => ' The role name may not be greater than 100 characters.',
                      'name.unique' => ' It seems role name already exist',
                  ]);

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->is_active = $request->input('is_active');

        Session::flash('success','Role Successfully Added');

        $role->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact(['role']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact(['role']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
          $this->validate($request,[
                      'name' => 'required|unique:roles|max:100',
                  ],[
                      'name.required' => ' The role name field is required.',
                      'name.max' => ' The role name may not be greater than 100 characters.',
                      'name.unique' => ' It seems role name already exist',
                  ]);

        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->is_active = $request->input('is_active');

        Session::flash('update','Role Successfully Updated');

        $role->save();
        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Session::flash('delete','Role Successfully Delete');
        return redirect('admin/roles');
    }
}
