<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $settings = Setting::firstOrCreate();
        return view('setting.create_setting', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // return view('setting.create_setting');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    Setting::create([
        //       'name'=>$request->name,
        //       'jop_name'=>$request->jop_name,
        //       'description'=>$request->description,
        //       'email'=>$request->email,
        //       'phone'=>$request->phone,
        //       'file_name'=>$request->file_name,
        //     ]);

        //     session()->flash('Add','تم اضافه البيانات بنجاح');
        //     return redirect('/settings');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting, $id)
    {
        // $settings=Setting::all();
        // return view('setting.create_setting',compact('settings'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
          $settings = Setting::find($id);
            Setting::where('id', $id)->update($request->except('_token', 'file_name', '_method'));
            
           if ($request->hasFile('file_name')) {
                $file_old = $settings->file_name;
                
                if (file_exists($file_old)) {
                    unlink($file_old);
                }
                
                $image = $request->file('file_name');
                $photoPath = $image->store('settings', 'public');
                $settings->update(['file_name' => 'storage/' . $photoPath]);
            }
        
        // $settings = Setting::find($id);
        // Setting::where('id', $id)->update($request->except('_token', 'file_name', '_method'));
        // if ($request->file_name != '') {
        //     if ($settings->file_name != '' && $settings->file_name != null) {
        //         $file_old = $settings->file_name;
        //         unlink($file_old);
        //     }
        //     $image = $request->file_name;
        //     $image_new = time() . '.' . $image->extension();
        //     $request->file_name
        //         ->move(public_path('settings'), $image_new);
        //     $settings->update(['file_name' => 'settings/' . $image_new]);
        // }
        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect('/adminPanel/setting_create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
