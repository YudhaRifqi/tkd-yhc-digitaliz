<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest;
use App\Models\Kursus;
use App\Models\Materi;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $materi = Materi::with('kursus')->get();

        $title = 'Hapus data!';
        $text = "Apakah anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);

        return view('materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kursus = Kursus::all();
        return view('materi.tambah', compact('kursus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MateriRequest $request)
    {
        //
        Materi::create([
            'kursus_id' => $request->kursus_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_embed' => $request->link_embed,
        ]);
        return redirect()->route('materiPage')->with('success', 'Data berhasil ditambah!');
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
        $kursus = Kursus::all();
        $materi = Materi::with('kursus')->findOrfail($id);
        return view('materi.ubah', compact('materi', 'kursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MateriRequest $request, string $id)
    {
        //

        $materi = Materi::findOrfail($id);
        $input = $request->all();
        $materi->update($input);
        return redirect()->route('materiPage')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $materi = Materi::findOrFail($id);
        $materi->delete();
        return redirect()->route('materiPage')->with('success', 'Data berhasil dihapus!');
    }
}
