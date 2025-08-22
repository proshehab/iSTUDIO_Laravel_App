<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\HeroImage;

class FrontendController extends Controller
{
    public function index(){
        $hero = Hero::first();
        $hero_images = HeroImage::all(); // ✅ Fetch all hero images
        return view('website.layouts.master', compact('hero', 'hero_images'));
    }


    public function about(){
        return view('website.pages.about');
    }

    public function service(){
        return view('website.pages.services');
    }

    public function project(){
        return view('website.pages.projects');
    }

    public function contact(){
        return view('website.pages.contact');
    }
}
