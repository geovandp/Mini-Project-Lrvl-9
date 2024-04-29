@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Create Data Mahasiswa</h1>
        <form action="/mahasiswa" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Mahasiswa</label>
                <input class="form-control form-control-sm" type="string" name="nama" id="nama">
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM Mahasiswa</label>
                <input class="form-control form-control-sm" type="number" name="nim" id="nim">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Mahasiswa</label>
                <input class="form-control form-control-sm" type="string" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No.Hp Mahasiswa</label>
                <input class="form-control form-control-sm" type="number" name="no_hp" id="no_hp">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan Mahasiswa</label>
                <input class="form-control form-control-sm" type="string" name="jurusan" id="jurusan">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Foto Diri Mahasiswa</label>
                <input class="form-control form-control-sm" type="file" name="image" id="image">
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>

@endsection
