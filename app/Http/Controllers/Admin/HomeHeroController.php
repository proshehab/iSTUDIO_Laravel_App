<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;


class HomeHeroController extends Controller
{
    public function index(){
        // Logic to display the home hero section
        return view('admin.hero_section.index');
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

    // public function edit($id){
    //     $heroSection = Hero::findOrFail($id);
    //     return view('admin.hero_section.edit', compact('heroSection'));
    // }

    public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'highlighted_word' => 'required|string|max:255',
                'subheading' => 'required|string|max:255',
                // Add other fields and rules as needed
            ]);

            $heroSection = Hero::findOrFail($id);
            $heroSection->update($validated);

            return view('admin.hero_section.index', compact('heroSection'))
                ->with('success', 'Home Hero section updated successfully.');
            
        }
}
