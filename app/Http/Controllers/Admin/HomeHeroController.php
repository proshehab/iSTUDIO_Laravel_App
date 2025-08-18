<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\HeroImage;
use App\Models\HeroFeature;

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
       $hero = Hero::findOrFail(1); // Assuming you want to fetch the hero with ID 1
        return view('admin.hero_section.image', compact('hero'));
    }

  public function imageCreate(Request $request)
    {
       // dd($request->all());
        $validated = $request->validate([
            'hero_id' => 'required|exists:heroes,id',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $heroImage = new HeroImage();
        $heroImage->hero_id = $validated['hero_id'];

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/hero_images'), $filename);
            $heroImage->image_path = $filename;
        }

        $heroImage->save();

        return redirect()->route('heroSection.image')
            ->with('success', 'Hero image uploaded successfully.');
    }
        
    public function feature(){
        $hero = Hero::findOrFail(1);
        return view('admin.hero_section.feature', compact('hero'));
    }


    public function featureList()
    {
        $features = HeroFeature::where('hero_id', 1)->get();
        return view('admin.hero_section.featureList', compact('features'));
    }

    public function featureStore(Request $request)
    {
        $validated = $request->validate([
            'hero_id' => 'required|exists:heroes,id',
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $heroFeature = new HeroFeature();
        $heroFeature->hero_id = $validated['hero_id'];

        $heroFeature->icon = $validated['icon'];
        $heroFeature->title = $validated['title'];
        $heroFeature->save();

        return redirect()->route('heroSection.feature')
            ->with('success', 'Hero feature created successfully.');
    }

}
