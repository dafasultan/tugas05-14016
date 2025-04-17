@extends('layouts.main')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tambah Obat Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada yang salah nih brok 😅<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat" placeholder="Contoh: Paracetamol"
                    value="{{ old('nama_obat') }}" required>
            </div>

            <div class="mb-3">
                <label for="kemasan" class="form-label">Kemasan</label>
                <input type="text" name="kemasan" class="form-control" id="kemasan" placeholder="Contoh: Strip 10 Tablet"
                    value="{{ old('kemasan') }}" required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Contoh: 10000"
                    value="{{ old('harga') }}" required>
            </div>

            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection