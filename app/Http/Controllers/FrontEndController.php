<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use App\Models\Highlight;
use App\Models\JobPost;
use App\Models\OurService;
use App\Models\Page;
use App\Models\Slider;
use App\Models\Trem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontEndController extends Controller
{
 public function index(){
    $slider=Slider::All();
    $lights=Highlight::all();
        $posts = JobPost::active(5)
        ->where('application_deadline', '>', now()) // Ensure the application deadline is in the future
        ->orderBy('application_deadline', 'asc')  // Order by the application deadline in ascending order
        ->get();
        return view('frontend.index',\compact('slider','lights', 'posts'));
 }

    public function vision()
    {
        $cores=CoreValue::all();
        return view('frontend.vision', \compact('cores'));
    }

    public function servises()
    {
        $ourservise=OurService::all();
        return view('frontend.servises', \compact('ourservise'));
    }
    // public function projects()
    // {
    //     $posts=JobPost::active(5)->get();
    //     return view('frontend.project' ,\compact('posts'));
    // }

    public function applicationstatus(){
        return view('frontend.applicationstatus');
    }









    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('frontend.plans', compact('page'));
    }

    public function ourtrem($slug)
    {
        $trem = Trem::where('slug', $slug)->firstOrFail();
        return view('frontend.ourtrem', compact('trem'));
    }




}


