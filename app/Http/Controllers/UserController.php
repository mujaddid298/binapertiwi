<?php

namespace App\Http\Controllers;

use App\Models\Persetujuan;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function formnak()
    {
        return view('pages.form_nak');
    }

    public function persetujuan()
    {
        return view('pages.persetujuan_nak');
    }
    public function index()
    {
        // Ambil semua data persetujuan dari database
        $persetujuan = Persetujuan::with('komite')->get();

        // Kirim data ke view
        return view('pages.persetujuan_nak', compact('persetujuan'));
    }

    public function meeting()
    {
        return view('pages.meeting');
    }
    public function storeMeeting(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'status' => 'required|string|in:tertunda,disetujui,ditolak',
        ]);

        // Redirect ke Halaman Meeting setelah Menyimpan
        return redirect()->route('pages.meeting')->with('success', 'Meeting Berhasil Ditambahkan');
    }
}