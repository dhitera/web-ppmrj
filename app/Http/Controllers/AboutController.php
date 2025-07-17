<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = About::latest()->first();
        return view('about', [
            "title" => "About",
            "about" => $data
        ]);
    }

    public function adminShow()
    {
        $data = About::latest()->first();
        $user = Auth::user();
        return view('Admin/about/index', [
            "title" => "About",
            'user' => $user,
            "about" => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editPage(About $about)
    {
        $about = About::latest()->first();
        $user = Auth::user();
        return view('Admin/about/editPage', [
            "title" => "Edit About",
            "about" => $about,
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatePage(Request $request, About $about)
    {
        $about = About::latest()->first();

        // Validate the input data
        $request->validate([
            'description' => 'required|string|max:255',
            'vision' => 'required|string|max:255',
            'mission' => 'required|string|max:255',
            'galleryTitle' => 'required|string|max:255',
            'galleryDescription' => 'required|string|max:255',
            'file_input' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:10240', // max 10MB
        ], [
            'file_input.max' => 'The image must not be larger than 10MB.',
            'file_input.mimes' => 'The image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Update data
        $about->description = $request->input('description');
        $about->vision = $request->input('vision');
        $about->mission = $request->input('mission');
        $about->galleryTitle = $request->input('galleryTitle');
        $about->galleryDescription = $request->input('galleryDescription');
        $about->save();

        // Handle the photo upload using Spatie Media Library
        if ($request->hasFile('file_input')) {
            // Clear existing images and add new one
            $about->clearMediaCollection('images');
            $about->addMediaFromRequest('file_input')
                ->toMediaCollection('images');
        }

        return redirect()->route('admin.about')->with('success', 'About updated successfully!');
    }

    /**
     * Show the form for editing the gallery images.
     */
    public function editGallery()
    {
        $about = About::latest()->first();
        $user = Auth::user();

        // Get existing gallery images (should be exactly 6)
        $galleryImages = $about->getMedia('gallery');

        return view('Admin/about/editGallery', [
            "title" => "Edit Gallery",
            "about" => $about,
            'user' => $user,
            'galleryImages' => $galleryImages
        ]);
    }

    /**
     * Update the gallery images in storage.
     */
    public function updateGallery(Request $request)
    {
        $about = About::latest()->first();

        // Validate only uploaded images (not required to upload all 6)
        $request->validate([
            'gallery_images' => 'nullable|array|max:6',
            'gallery_images.*' => 'nullable|file|image|mimes:jpeg,jpg,png,webp|max:10240', // max 10MB each
        ], [
            'gallery_images.max' => 'You can upload maximum 6 images for the gallery.',
            'gallery_images.*.max' => 'Each image must not be larger than 10MB.',
            'gallery_images.*.mimes' => 'Each image must be a file of type: JPEG, JPG, PNG, or WebP.',
        ]);

        // Get existing gallery images
        $existingImages = $about->getMedia('gallery');

        // Handle individual image updates
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $file) {
                if ($file) {
                    // Remove existing image at this position if it exists
                    if (isset($existingImages[$index])) {
                        $existingImages[$index]->delete();
                    }

                    // Add new image at this position
                    $about->addMediaFromRequest("gallery_images.{$index}")
                        ->usingName("Gallery Image " . ($index + 1))
                        ->toMediaCollection('gallery');
                }
            }
        }

        return redirect()->route('admin.about')->with('success', 'Gallery images updated successfully!');
    }

    /**
     * Delete a specific gallery image.
     */
    public function deleteGalleryImage(Request $request)
    {
        $about = About::latest()->first();
        $position = $request->input('position');

        if ($position >= 0 && $position < 6) {
            $galleryImages = $about->getMedia('gallery');
            if (isset($galleryImages[$position])) {
                $galleryImages[$position]->delete();
                return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
            }
        }

        return response()->json(['success' => false, 'message' => 'Image not found']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
