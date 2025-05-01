<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Periksa;
use Auth;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasiens.index', compact('pasiens'));
    }

    public function pasienRiwayat()
    {
        $periksas = Periksa::where('id_pasien', auth()->id())->get();
        return view('pasien.riwayat', compact('periksas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasiens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasiens.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil dihapus!');
    }
}
