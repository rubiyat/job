<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        $number = 1;
        return view('admin.contacts.index', compact(['contacts', 'number']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;

         $this->validate($request,[
                      'subject' => 'required|max:100',
                  ],[
                      'subject.required' => ' The contact subject field is required.',
                      'subject.max' => ' The contact subject may not be greater than 100 characters.',
                  ]);

        $contact->user_id = Auth::user()->id;
        $contact->subject = $request->input('subject');
        $contact->body = $request->input('body');

        Session::flash('success','Contact Successfully Send');
        $contact->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact(['contact']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact(['contact']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
          $this->validate($request,[
                      'subject' => 'required|max:100',
                  ],[
                      'subject.required' => ' The contact subject field is required.',
                      'subject.max' => ' The contact subject may not be greater than 100 characters.',
                  ]);

        $contact->user_id = Auth::user()->id;
        $contact->subject = $request->input('subject');
        $contact->body = $request->input('body');

        Session::flash('update','Contact Successfully Update');
        $contact->save();
        return redirect('admin/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        Session::flash('delete','Contact Deleted');
        return redirect('admin/contacts');
    }
}
