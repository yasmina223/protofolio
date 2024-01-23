<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::all();
        return view('cotact_us.contact_us', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $new=ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
           'phone' => $request->phone,
        ]);
        session()->flash('Add', 'تم اضافه البيانات بنجاح');
        return redirect('/adminPanel/contacts');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        $id = $request->id;
        $contacts = ContactUs::find($id);
        $contacts->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'phone'=> $request->phone,
        ]);
        session()->flash('edit', 'تم تعديل البيانات بنجاح');
        return redirect('/adminPanel/contacts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        ContactUs::destroy($id);
        session()->flash('delete', 'تم حذف البيانات بنجاح');
        return redirect('/adminPanel/contacts');
    }
}
