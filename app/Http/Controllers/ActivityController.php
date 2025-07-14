<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $data = Activity::all();
        return view('activity', [
            "title" => "Activities",
            "activity" => $data
        ]);
    }

    public function adminShow()
    {
        $data = Activity::all();
        $user = Auth::user();
        return view('Admin/activity/index', [
            "title" => "Activities",
            "activity" => $data,
            "user" => $user
        ]);
    }

    public function add()
    {
        $user = Auth::user();
        return view('Admin/activity/add', [
            "title" => "Add Activity",
            "user" => $user
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
        ], [
            'file_input.max' => 'The image must not be larger than 5MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Create new Activity
        $activity = new Activity();
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            $activity->addMediaFromRequest('file_input')
                ->toMediaCollection('images');
        }

        return redirect()->route('admin.activity')->with('success', 'Activity added successfully!');
    }

    public function edit($id)
    {
        $data = Activity::find($id);
        $user = Auth::user();
        return view('Admin/activity/edit', [
            "title" => "Edit Activity",
            "activity" => $data,
            "user" => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
        ], [
            'file_input.max' => 'The image must not be larger than 5MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Update the activity data
        $activity->title = $request->input('title');
        $activity->description = $request->input('description');
        $activity->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            // Clear existing images and add new one
            $activity->clearMediaCollection('images');
            $activity->addMediaFromRequest('file_input')
                ->toMediaCollection('images');
        }

        return redirect()->route('admin.activity')->with('success', 'Activity updated successfully!');
    }

    public function delete($id)
    {
        $activity = Activity::findOrFail($id);

        // Delete the activity (Media Library will automatically clean up associated media)
        $activity->delete();

        return redirect()->route('admin.activity')->with('success', 'Activity deleted successfully!');
    }
}
