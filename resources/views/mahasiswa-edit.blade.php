@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Edit Data Mahasiswa</h1>
        <form action="/mahasiswa/{{ $mahasiswaList->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input class="form-control form-control-sm" type="string" name="nama" id="nama" value="{{ $mahasiswaList->nama }}">
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM Mahasiswa</label>
                <input class="form-control form-control-sm" type="number" name="nim" id="nim" value="{{ $mahasiswaList->nim }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input class="form-control form-control-sm" type="string" name="email" id="email" value="{{ $mahasiswaList->email }}">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No.Hp Mahasiswa</label>
                <input class="form-control form-control-sm" type="number" name="no_hp" id="no_hp" value="{{ $mahasiswaList->no_hp }}">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan Mahasiswa</label>
                <input class="form-control form-control-sm" type="atring" name="jurusan" id="jurusan" value="{{ $mahasiswaList->jurusan }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto Diri Mahasiswa</label>
                <input class="form-control form-control-sm" type="file" name="foto" id="foto" value="{{ $mahasiswaList->image }}">
                <img src="{{ asset($mahasiswaList->image) }}" width="300px">
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection
