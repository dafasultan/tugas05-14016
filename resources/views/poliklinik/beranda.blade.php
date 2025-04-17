@extends('layouts.main')

@section('title', 'Landing Page')

@section("content")
    <div class="row">
        <div class="col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>Obat</h3>
                    <p>Tambah Obat</p>
                </div>
                <div class="icon">
                    <i class="fas fa-pills"></i>
                </div>
                <a href="/obat" class="small-box-footer">
                    Tambah / Edit Daftar Obat <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-6">
            <div class="small-box" style="background: #3781a3">
                <div class="inner text-white">
                    <h3>Pasien</h3>
                    <p>Registrasi Pasien</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="/pasiens" class="small-box-footer">
                    Tambah / Edit Pasien <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>


@endsection