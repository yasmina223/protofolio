<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\ContactUs;
use App\Models\OnlineCourses;
use App\Models\SocialMedia;
use App\Models\Experience;
use App\Models\Skills;
use PhpParser\Node\Stmt\Return_;

class FrontController extends Controller
{
   public function index(){
    $settings = Setting::all();
    $courses=OnlineCourses::all();
    $social = SocialMedia::all();
    $skills=Skills::all();
    $experiences=Experience::all();
    $contacts = ContactUs::all();
    return view('front.index',compact('settings','courses','social','skills','experiences','contacts'));

   }

   public function store(Request $request)
    {
       $new=ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'phone' =>$request->phone,
        ]);

    }
}
