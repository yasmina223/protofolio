<?php

namespace App\Http\Controllers;

use App\Models\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $skills=Skills::all();
       return view('skills.skills',compact('skills'));
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
        Skills::create([
            'skills'=>$request->skill
        ]);
        session()->flash('Add','تم اضافه البيانات بنجاح');
        return redirect('/adminPanel/skills');

    }

    /**
     * Display the specified resource.
     */
    public function show(Skills $skills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skills $skills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id=$request->id;
        $skills=Skills::find($id);
        $skills->update([
     'skills'=>$request->skill
        ]);
        session()->flash('edit','تم تعديل البيانات بنجاح');
        return redirect('/adminPanel/skills');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $id=$request->id;
       Skills::destroy($id);
       session()->flash('delete','تم حذف البيانات بنجاح');
       return redirect('/adminPanel/skills');
    }
}
