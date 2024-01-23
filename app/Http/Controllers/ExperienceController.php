<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences=Experience::all();
        return view('experiences.experience',compact('experiences'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Experience::create([
            'from_date'=>$request->from_date,
            'to_date'=>$request->to_date,
            'position'=>$request->position,
            'company'=>$request->company,
            'status'=>$request->status,
              ]);
              session()->flash('Add','تم اضافه البيانات بنجاح');
              return redirect('/adminPanel/experiences');
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $experiences=Experience::find($id);
       $experiences->update([
        'from_date'=>$request->from_date,
        'to_date'=>$request->to_date,
        'position'=>$request->position,
         'company'=>$request->company,
         'status'=>$request->status,
             ]);
      session()->flash('edit','تم تعديل البيانات بنجاح');
      return redirect('/adminPanel/experiences');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Experience::destroy($id);
       session()->flash('delete','تم حذف البيانات بنجاح');
       return redirect('/adminPanel/experiences');
    }
}
