<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persetujuan;

class PersetujuanNakController extends Controller
{

    public function create()
    {
        return view('pages.input_persetujuan_nak');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nak_id' => 'required',
            'komite_id' => 'required',
            'status' => 'required',
            'komentar' => 'nullable|string',
            'tanggal_persetujuan' => 'required|date',
        ]);

        Persetujuan::create([
            'nak_id' => $request->nak_id,
            'komite_id' => $request->komite_id,
            'status' => $request->status,
            'komen' => $request->komentar,
            'tanggal_persetujuan' => $request->tanggal_persetujuan,
        ]);

        return redirect()->route('persetujuan_nak.create')->with('success', 'Data berhasil disimpan.');
    }
}