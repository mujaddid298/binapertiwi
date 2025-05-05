<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::all();
        return view('pages.admin.meeting.index', compact('meetings'));
    }

    public function create()
    {
        return view('pages.admin.meeting.crud');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'link' => 'required|string|max:255',
        ]);

        Meeting::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal . ' ' . $request->jam,
            'link' => $request->link,
            'status' => 'scheduled',
        ]);

        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil ditambahkan');
    }

    public function show($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('pages.admin.meeting.show', compact('meeting'));
    }

    public function edit($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('pages.admin.meeting.crud', compact('meeting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'link' => 'required|string|max:255',
        ]);

        $meeting = Meeting::findOrFail($id);
        $meeting->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal . ' ' . $request->jam,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil diperbarui');
    }

    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('admin.meeting.index')->with('success', 'Meeting berhasil dihapus');
    }


    //halaman bc
    public function indexbc()
    {
        $meetings = Meeting::all();
        return view('pages.bc.meeting.index', compact('meetings'));
    }

    public function createbc()
    {
        return view('pages.bc.meeting.crud');
        
    }

    public function storebc(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'link' => 'required|string|max:255',
        ]);

        Meeting::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal . ' ' . $request->jam,
            'link' => $request->link,
            'status' => 'scheduled',
        ]);

        return redirect()->route('bc.meeting.index')->with('success', 'Meeting berhasil ditambahkan');
    }

    public function showbc($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('pages.bc.meeting.show', compact('meeting'));
    }

    public function editbc($id)
    {
        $meeting = Meeting::findOrFail($id);
        return view('pages.bc.meeting.crud', compact('meeting'));
    }

    public function updatebc(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'link' => 'required|string|max:255',
        ]);

        $meeting = Meeting::findOrFail($id);
        $meeting->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal . ' ' . $request->jam,
            'link' => $request->link,
        ]);

            return redirect()->route('bc.meeting.index')->with('success', 'Meeting berhasil diperbarui');
    }

    public function destroybc($id)
    {
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('bc.meeting.index')->with('success', 'Meeting berhasil dihapus');
    }
}