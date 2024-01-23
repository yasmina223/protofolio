<?php

namespace App\Http\Controllers;
use App\Traits\traitTrait;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SocialMediaController extends Controller
{

    // use traitTrait;
    public function index()
    {
       $social = SocialMedia::all();
       return view('socialmedia.social_media',compact('social'));

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

// if ($request->hasFile('image')) {
//     $image = $request->file('image');
//     $file_name = $image->getClientOriginalName();

// }
if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photoPath = $image->store('socialMedia', 'public');
        }
SocialMedia::create([
    'image' =>'storage/' .  $photoPath,
    'link' => $request->link,
]);

// move pic

// $imageName = $request->image->getClientOriginalName();
// $request->image->move(public_path('images/'), $imageName);
    session()->flash('Add','تم اضافه البيانات بنجاح');
        return redirect('/adminPanel/social_media');

    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $id=$request->id;
        $social = SocialMedia::find($id);
           SocialMedia::where('id',$id)->update($request->except('_token','image','_method'));
            
           if ($request->hasFile('image')) {
                $file_old = $social->image;
                
                if (file_exists($file_old)) {
                    unlink($file_old);
                }
                
                $image = $request->file('image');
                $photoPath = $image->store('images', 'public');
                $social->update(['image' => 'storage/' . $photoPath]);
            }
            session()->flash('edit','تم تعديل البيانات بنجاح');
        return redirect('/adminPanel/social_media');
    






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, SocialMedia $social)
    {
       $id=$request->id;
       $social=SocialMedia::find($id);
       $social->delete();
       session()->flash('delete','تم حذف البيانات بنجاح');
       return redirect('/adminPanel/social_media');

    }
}
