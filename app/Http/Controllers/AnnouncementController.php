<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\SelectedStudent;
use Illuminate\Support\Facades\Auth;
use App\Models\AdditionalInformation;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSantri = SelectedStudent::all();
        $dataInformasi = AdditionalInformation::all();
        return view('announcement', [
            "title" => "Announcement",
            "santri" => $dataSantri,
            "informasi" => $dataInformasi
        ]);
    }

    public function closed()
    {
        return view('closed', [
            "title" => "Announcement Closed",
            "message" => "Pengumuman Ditutup. Cek saat pengumuman dibuka kembali."
        ]);
    }

    public function adminShow()
    {
        $dataSantri = SelectedStudent::all();
        $dataInformasi = AdditionalInformation::all();
        $user = Auth::user();
        return view('Admin/announcement/index', [
            "title" => "Announcement",
            "santri" => $dataSantri,
            "informasi" => $dataInformasi,
            "user" => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createSantri()
    {
        $user = Auth::user();
        return view('Admin/announcement/addSantri', [
            "title" => "Add Santri",
            "user" => $user
        ]);
    }

    public function createInfo()
    {
        $user = Auth::user();
        return view('Admin/announcement/addInfo', [
            "title" => "Add Info",
            "user" => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeSantri(Request $request)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_city' => 'required|string|max:255',
            'gelombang' => 'required|string|in:gelombang1,gelombang2',
        ], [
            'student_name.required' => 'Nama harus diisi.',
            'student_city.required' => 'Asal Kota harus diisi.',
            'gelombang.required' => 'Gelombang harus dipilih.',
        ]);

        // Set announcement_id based on gelombang
        $announcementId = 1; // Default to gelombang1
        if ($validatedData['gelombang'] === 'gelombang2') {
            $announcementId = 2;
        }

        $selectedStudent = new SelectedStudent();
        $selectedStudent->student_name = $validatedData['student_name'];
        $selectedStudent->student_city = $validatedData['student_city'];
        $selectedStudent->gelombang = $validatedData['gelombang'];
        $selectedStudent->announcement_id = $announcementId;
        $selectedStudent->save();

        return redirect()->route('admin.announcement')->with('success', 'Santri berhasil ditambahkan.');
    }

    public function storeInfo(Request $request)
    {
        $validatedData = $request->validate([
            'info' => 'required|string|max:255',
        ], [
            'info.required' => 'Nama harus diisi.',
        ]);


        $infoTambahan = new AdditionalInformation();
        $infoTambahan->info = $validatedData['info'];
        $infoTambahan->announcement_id = 1;
        $infoTambahan->save();

        return redirect()->route('admin.announcement')->with('success', 'Informasi Tambahan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editSantri($id)
    {
        $data = SelectedStudent::findOrFail($id);
        $user = Auth::user();
        return view('Admin/announcement/editSantri', [
            "title" => "Edit Santri",
            "user" => $user,
            'dataSantri' => $data
        ]);
    }

    public function editInfo($id)
    {
        $data = AdditionalInformation::findOrFail($id);
        $user = Auth::user();
        return view('Admin/announcement/editInfo', [
            "title" => "Edit Info",
            "user" => $user,
            'dataInfo' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateSantri(Request $request, $id)
    {
        $selectedStudent = SelectedStudent::findOrFail($id);

        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_city' => 'required|string|max:255',
            'gelombang' => 'required|string|in:gelombang1,gelombang2',
        ], [
            'student_name.required' => 'Nama harus diisi.',
            'student_city.required' => 'Asal Kota harus diisi.',
            'gelombang.required' => 'Gelombang harus dipilih.',
        ]);

        // Set announcement_id based on gelombang
        $announcementId = 1; // Default to gelombang1
        if ($validatedData['gelombang'] === 'gelombang2') {
            $announcementId = 2;
        }

        $selectedStudent->student_name = $validatedData['student_name'];
        $selectedStudent->student_city = $validatedData['student_city'];
        $selectedStudent->gelombang = $validatedData['gelombang'];
        $selectedStudent->announcement_id = $announcementId;
        $selectedStudent->save();

        return redirect()->route('admin.announcement')->with('success', 'Santri berhasil diubah.');
    }

    public function updateInfo(Request $request, $id)
    {
        $infoTambahan = AdditionalInformation::findOrFail($id);

        $validatedData = $request->validate([
            'info' => 'required|string|max:255',
        ], [
            'info.required' => 'Nama harus diisi.',
        ]);

        $infoTambahan->info = $validatedData['info'];
        $infoTambahan->announcement_id = 1;
        $infoTambahan->save();

        return redirect()->route('admin.announcement')->with('success', 'Informasi Tambahan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroySantri($id)
    {
        $dataSantri = SelectedStudent::findOrFail($id);

        $dataSantri->delete();

        return redirect()->route('admin.announcement')->with('success', 'Data Santri Berhasil Dihapus!');
    }

    public function destroyInfo($id)
    {
        $dataInfo = AdditionalInformation::findOrFail($id);

        $dataInfo->delete();

        return redirect()->route('admin.announcement')->with('success', 'Data Info Berhasil Dihapus!');
    }
}
