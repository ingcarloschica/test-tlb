<?php

namespace App\Http\Controllers;

use App\Mail\sendmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname'          => 'required|max:50',
            'lastname'           => 'required|max:50',
            'contactnumber'      => 'required',
            'email'              => 'required|max:50|unique:contacts,email',
        ]);

        $contact = Contact::create($request->all());

        //send mail
        $msg="We added you in our contact list. Thank you";
        $this->sendmail($request->email, $msg);

        
        return redirect()->route('home')
            ->with('status_success','Contact saved successfully'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //return ($contact);
        return view ('contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'));
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
        $request->validate([
            'firstname'          => 'required|max:50',
            'lastname'           => 'required|max:50',
            'contactnumber'      => 'required',
            'email'              => 'required|max:50|unique:contacts,email,'.$contact->id,
        ]);

        //return $request;

        $contact->update($request->all());
        
        return redirect()->route('home')
            ->with('status_success','Contact updated successfully');
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
            return redirect()->route('home')
            ->with('status_success','Contact successfully removed');
    }

    public function sendmail($email, $msg){
        Mail::to($email)->send(new sendmail($msg));
    }

}
