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

    public function viewpdf()
    {
        $data = Structure::all();
        $user = Auth::user();
        $mpdf = new \Mpdf\Mpdf();

        // Build HTML string with improved styling
        $html = '<h1 style="text-align: center; color: #333;">Structure Report</h1>';
        $html .= '<table border="1" style="width:100%; border-collapse: collapse; margin-top: 20px;">';
        $html .= '<tr style="background-color: #f2f2f2;">
                    <th style="padding: 10px; text-align: center;">Photo</th>
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Job Desk</th>
                  </tr>';

        foreach ($data as $structure) {
            $html .= '<tr>';

            // Handle profile image
            $html .= '<td style="padding: 10px; text-align: center; width: 120px;">';
            $firstImage = $structure->getFirstMedia('images');
            if ($firstImage) {
                // Get the full path to the image
                $imagePath = $firstImage->getPath();

                // Check if image exists
                if (file_exists($imagePath)) {
                    // Convert image to base64 for PDF embedding
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageInfo = getimagesize($imagePath);
                    $mimeType = $imageInfo['mime'];

                    $html .= '<img src="data:' . $mimeType . ';base64,' . $imageData . '" 
                             style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;" />';
                } else {
                    $html .= '<div style="width: 80px; height: 80px; background-color: #f0f0f0; 
                             display: flex; align-items: center; justify-content: center; 
                             border-radius: 5px; font-size: 12px; color: #666;">No Photo</div>';
                }
            } else {
                $html .= '<div style="width: 80px; height: 80px; background-color: #f0f0f0; 
                         display: flex; align-items: center; justify-content: center; 
                         border-radius: 5px; font-size: 12px; color: #666;">No Photo</div>';
            }
            $html .= '</td>';

            $html .= '<td style="padding: 10px; vertical-align: middle;">' . htmlspecialchars($structure->name) . '</td>';
            $html .= '<td style="padding: 10px; vertical-align: middle;">' . htmlspecialchars($structure->jobdesk) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

        // Add footer with date
        $html .= '<div style="margin-top: 30px; text-align: right; font-size: 12px; color: #666;">
                    Generated on: ' . date('Y-m-d H:i:s') . '
                  </div>';

        $mpdf->WriteHTML($html);
        $mpdf->Output('structure-report.pdf', 'I'); // 'I' for inline display
    }
}
