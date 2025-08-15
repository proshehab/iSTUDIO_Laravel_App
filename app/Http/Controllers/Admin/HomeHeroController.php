<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;


class HomeHeroController extends Controller
{
    public function index(){
        $heroes = Hero::find(1);
        return view('admin.hero_section.index', compact('heroes'));
    }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'highlighted_word' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                // Add other fields and rules as needed
            ]);


            Hero::create($validated);

            return redirect()->route('heroSection.index')
                ->with('success', 'Home Hero section created successfully.');
        }

   public function update(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'highlighted_word' => 'required|string|max:255',
            'subheading' => 'required|string|max:255',
        ]);

        // Assuming only one hero section (ID = 1 or first row)
        $heroSection = Hero::first(); // or Hero::find(1);
        
        if ($heroSection) {
            $heroSection->update($validated);
        } else {
            // Create the record if it doesn't exist
            $heroSection = Hero::create($validated);
        }

        return redirect()->back()->with('success', 'Home Hero section updated successfully.');
    }

    // Image

    public function image()
    {
       // $heroes = Hero::find(1);
        return view('admin.hero_section.image');
    }

}
