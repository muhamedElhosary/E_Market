<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin=User::all()->last();
        $msgs=ContactUS::all();
        return view('admin.messages',compact('msgs','admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required'
        ]);

        $contact=new ContactUS;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;
        $contact->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUS $contactus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUS $contactus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUS $contactus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg=ContactUS::where('id',$id);
        $msg->delete();
        return redirect('/messages')->with('success', 'Product deleted successfully');
    }
}
