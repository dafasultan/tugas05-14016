<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Periksa;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        return view('dokter.dashboard');
    }

    public function periksa()
    {
        // Ambil semua data pasien dari database
        $periksas = Periksa::with('pasien', 'dokter')->get();
        $obats = Obat::all();

        return view('dokter.periksa', compact('periksas', 'obats'));

    }

    public function create()
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Pasien::create($request->all());

        return redirect('/dokter/periksa')->with('success', 'Pasien berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('dokter.edit', compact('pasien'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return redirect('/dokter/periksa')->with('success', 'Pasien berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect('/dokter/periksa')->with('success', 'Pasien berhasil dihapus');
    }
}
