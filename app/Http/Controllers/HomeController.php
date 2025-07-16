<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Activity::latest()->paginate(4);
        $dataHome = Home::latest()->first();
        return view('home', [
            "title" => "Home",
            "activity" => $data,
            "home" => $dataHome
        ]);
    }

    public function adminShow()
    {
        $data = Home::latest()->first();
        $user = Auth::user();
        return view('Admin/home/index', [
            "title" => "Home",
            'user' => $user,
            "home" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $home = Home::latest()->first();
        $user = Auth::user();
        return view('Admin/home/edit', [
            "title" => "Edit Home",
            "home" => $home,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $home = Home::latest()->first();

        // Validate the input data
        $request->validate([
            'header' => 'required|string|max:255',
            'subheader' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'guruCount' => 'required|integer|min:0',
            'studentCount' => 'required|integer|min:0',
            'alumniCount' => 'required|integer|min:0',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
        ], [
            'file_input.max' => 'The image must not be larger than 5MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Update data
        $home->header = $request->input('header');
        $home->subheader = $request->input('subheader');
        $home->description = $request->input('description');
        $home->guruCount = $request->input('guruCount');
        $home->studentCount = $request->input('studentCount');
        $home->alumniCount = $request->input('alumniCount');
        $home->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            // Clear existing images and add new one
            $home->clearMediaCollection('images');
            $home->addMediaFromRequest('file_input')
                ->toMediaCollection('images');
        }

        return redirect()->route('admin.home')->with('success', 'Home updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
