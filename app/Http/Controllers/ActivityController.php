<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('Admin/activity/index', [
            "title" => "Activities",
            "activity" => $data
        ]);
    }

    public function add()
    {
        return view('Admin/activity/add', [
            "title" => "Add Activity",
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg|max:2048', // max 2MB
        ], [
            'file_input.max' => 'The photo must not be larger than 2MB.',
            'file_input.mimes' => 'The photo must be a file of type: jpeg, jpg.',
        ]);


        // Handle the photo upload
        if ($request->hasFile('file_input')) {
            $photo = $request->file('file_input');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('img/activity', $filename, 'public');
        }

        // Create new Activity
        $activity = new Activity();
        $activity->title = $validatedData['title'];
        $activity->description = $validatedData['description'];
        $activity->image_url = $path ?? null;
        $activity->save();

        return redirect()->route('admin.activity')->with('success', 'Activity added successfully!');
    }

    public function edit($id)
    {
        $data = Activity::find($id);
        return view('Admin/activity/edit', [
            "title" => "Edit Activity",
            "activity" => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg|max:2048', // max 2MB
        ], [
            'file_input.max' => 'The photo must not be larger than 2MB.',
            'file_input.mimes' => 'The photo must be a file of type: jpeg, jpg.',
        ]);

        // Update the structure data
        $activity->title = $request->input('title');
        $activity->description = $request->input('description');

        // Handle the photo upload
        if ($request->hasFile('file_input')) {
            // Delete the existing photo
            if ($activity->image_url) {
                Storage::delete('public/' . $activity->image_url);
            }

            // Upload the new photo
            $photo = $request->file('file_input');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('img/activity', $filename, 'public');

            // Update the photo path in the database
            $activity->image_url = $path;
        }

        $activity->save();

        return redirect()->route('admin.activity')->with('success', 'Activity updated successfully!');
    }

    public function delete($id)
    {
        $activity = Activity::findOrFail($id);

        // Delete the associated image if it exists
        if ($activity->image_url) {
            Storage::delete('public/' . $activity->image_url);
        }

        // Delete the activity
        $activity->delete();

        return redirect()->route('admin.activity')->with('success', 'Activity deleted successfully!');
    }
}
