@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-center align-items-center">
    <div class="card bg-danger" style="width: 25rem; height: 28rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body text-center">
            <img src="{{ asset($mahasiswaList->image) }}" width="200px">
            <div class="">.....</div>
            <div class="card-body2 bg-white">
                <h2 class="card-title">{{ $mahasiswaList->nama }}</h2>
                <h4 class="card-text">{{ $mahasiswaList->nim }}</h4>
                <h4 class="card-text">{{ $mahasiswaList->jurusan }}</h4>
                <h6 class="card-text">{{ $mahasiswaList->email }}</h6>
                <h6 class="card-text">{{ $mahasiswaList->no_hp }}</h6>
            </div>
            <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>

@endsection