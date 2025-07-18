<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
        ], [
            'file_input.max' => 'The image must not be larger than 5MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Update the structure data
        $structure->name = $request->input('nama');
        $structure->jobdesk = $request->input('jobdesk');
        $structure->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            // Clear existing images and add new one
            $structure->clearMediaCollection('images');
            $structure->addMediaFromRequest('file_input')
                ->toMediaCollection('images');
        }

        return redirect()->route('admin.structure')->with('success', 'Structure updated successfully!');
    }
}
