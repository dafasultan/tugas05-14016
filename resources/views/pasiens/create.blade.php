@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Pasien</h1>

        <form action="{{ route('pasiens.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="{{ route('pasiens.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
@endsection