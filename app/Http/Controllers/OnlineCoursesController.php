<?php

namespace App\Http\Controllers;

use App\Models\OnlineCourses;
use Illuminate\Http\Request;

class OnlineCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=OnlineCourses::all();
        return view('onlinecourses.onlinecourse',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //   return view('onlinecourses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OnlineCourses::create([
        'name'=>$request->name,
        'description'=>$request->description
        ]);

        session()->flash('Add','تم اضافه البيانات بنجاح');
        return redirect('/adminPanel/courses');

    }

    /**
     * Display the specified resource.
     */
    public function show(OnlineCourses $onlineCourses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnlineCourses $onlineCourses)
     {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       $id=$request->id;
        $courses=OnlineCourses::find($id);
        $courses->update([
            'name'=>$request->name,
           'description'=>$request->description,
        ]);

        session()->flash('edit','تم التعديل بنجاح');
        return redirect('/adminPanel/courses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        $id = $request->id;
        OnlineCourses::destroy($id);
        session()->flash('delete','تم الحذف بنجاح');
        return redirect('/adminPanel/courses');

    }
}
