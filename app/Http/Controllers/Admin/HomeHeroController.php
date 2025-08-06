<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeHeroController extends Controller
{
    public function index(){
        // Logic to display the home hero section
        return view('admin.home_hero.index');
    }
}
