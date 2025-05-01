<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Periksa;
use App\Models\User;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periksas = Periksa::with('pasien', 'dokter')->get();

        return view('dokter.periksa', compact('periksas'));
    }


    public function periksaPasien()
    {
        $periksas = Periksa::with('pasien', 'dokter')->get();
        $dokters = User::where('role', 'dokter')->get();

        return view('pasien.periksa', compact('periksas', 'dokters'));

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
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'dokter_id' => 'required|exists:users,id',
            'keluhan' => 'required|string',
        ]);

        // Buat entri periksa baru
        Periksa::create([
            'id_pasien' => auth()->user()->id,  // Ambil ID Pasien yang login
            'id_dokter' => $validated['dokter_id'],
            'tanggal_periksa' => now(),  // Set tanggal periksa sekarang
            'catatan' => $validated['keluhan'],  // Keluhan pasien
            'biaya' => 0,  // Biaya bisa di-set sesuai kebutuhan
        ]);

        // Redirect setelah berhasil
        return redirect()->route('pasien.periksa')->with('success', 'Keluhan berhasil dikirim!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $periksa = Periksa::with('pasien', 'dokter')->findOrFail($id);
        return view('dokter.periksa', compact('periksa'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.diagnosa', compact('periksa', 'obats'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function diagnosaPost(Request $request, $id)
    {
        $request->validate([
            'hasil_diagnosa' => 'required|string|max:255',
            'obat_id' => 'required|exists:obats,id',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->hasil_diagnosa = $request->hasil_diagnosa;
        $periksa->obat_id = $request->obat_id;
        $periksa->save();

        return redirect()->route('dokter.periksa')->with('success', 'Diagnosa dan obat berhasil disimpan!');
    }


}
