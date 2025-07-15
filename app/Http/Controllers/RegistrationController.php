<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * Display the registration form
     */
    public function index()
    {
        $data = Registration::latest()->first();
        return view('registration', [
            "title" => "Registration",
            "registration" => $data
        ]);
    }

    /**
     * Display the closed registration page
     */
    public function closed()
    {
        return view('closed', [
            "title" => "Registration Closed",
            "message" => "Pendaftaran Ditutup. Silahkan cek kembali saat pendaftaran dibuka."
        ]);
    }

    public function adminShow()
    {
        $data = Registration::latest()->first();
        $user = Auth::user();
        return view('Admin/registration/index', [
            "title" => "Registration",
            'user' => $user,
            "registration" => $data
        ]);
    }

    public function edit()
    {
        $registration = Registration::latest()->first();
        $user = Auth::user();
        return view('Admin/registration/edit', [
            "title" => "Edit Registration",
            "registration" => $registration,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $registration = Registration::latest()->first();

        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'registration_link' => 'required|string|max:255',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:5120', // max 5MB
        ], [
            'file_input.max' => 'The image must not be larger than 5MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Update data
        $registration->title = $request->input('title');
        $registration->description = $request->input('description');
        $registration->registration_link = $request->input('registration_link');
        $registration->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            // Clear existing images and add new one
            $registration->clearMediaCollection('registration');
            $registration->addMediaFromRequest('file_input')
                ->toMediaCollection('registration');
        }

        return redirect()->route('admin.registration')->with('success', 'Registration updated successfully!');
    }
}
