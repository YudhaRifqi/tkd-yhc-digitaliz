<?php

namespace App\Http\Controllers;

use App\Http\Requests\KursusRequest;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kursus = Kursus::latest()->get();

        $title = 'Hapus data!';
        $text = "Apakah anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);

        return view('kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kursus.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KursusRequest $request)
    {
        //

        Kursus::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'durasi' => $request->durasi,
        ]);

        //mengembalikan ke view 
        return redirect()->route('kursusPage')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kursus = Kursus::findOrfail($id);
        return view('kursus.ubah', compact('kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KursusRequest $request, string $id)
    {
        //

        $kursus = Kursus::findOrfail($id);
        $input = $request->all();
        $kursus->update($input);
        return redirect()->route('kursusPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $kursus = Kursus::findOrFail($id);
        $kursus->delete();
        return redirect()->route('kursusPage')->with('success', 'Data berhasil dihapus!');
    }
}
