<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StructureController extends Controller
{

    public function show()
    {
        $data = Structure::all()->groupBy('jobdesk');
        return view('structure', [
            "title" => "Structure",
            "structures" => $data
        ]);
    }

    public function adminShow()
    {
        $data = Structure::all();
        $user = Auth::user();
        return view('Admin/structure/index', [
            "title" => "Structure",
            "structures" => $data,
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $structure = Structure::find($id);
        $user = Auth::user();
        return view('Admin/structure/edit', [
            "title" => "Edit Structure",
            "structure" => $structure,
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $structure = Structure::findOrFail($id);

        // Validate the input data
        $request->validate([
            'nama' => 'required|string|max:255',
            'jobdesk' => 'required|string|max:255',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg|max:1024', // max 1MB
        ], [
            'file_input.max' => 'The photo must not be larger than 1MB.',
            'file_input.mimes' => 'The photo must be a file of type: jpeg, jpg.',
        ]);

        // Update the structure data
        $structure->name = $request->input('nama');
        $structure->jobdesk = $request->input('jobdesk');

        // Handle the photo upload
        if ($request->hasFile('file_input')) {
            // Delete the existing photo
            if ($structure->profile_url) {
                Storage::delete('public/' . $structure->profile_url);
            }

            // Upload the new photo
            $photo = $request->file('file_input');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('img/people', $filename, 'public');

            // Update the photo path in the database
            $structure->profile_url = $path;
        }

        $structure->save();

        return redirect()->route('admin.structure')->with('success', 'Structure updated successfully!');
    }
}
