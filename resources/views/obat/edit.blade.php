@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h3>Edit Obat</h3>

        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat', $obat->nama_obat) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="kemasan" class="form-label">Kemasan</label>
                <input type="text" name="kemasan" class="form-control" value="{{ old('kemasan', $obat->kemasan) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga', $obat->harga) }}" required>
            </div>

            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update Obat</button>
        </form>
    </div>
@endsection