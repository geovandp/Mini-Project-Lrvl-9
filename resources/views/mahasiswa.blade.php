@extends('layouts.main')

@section('content')
<h1>List Mahasiswa</h1>

<div class="d-flex ms-auto">
    <a href="/mahasiswa/create" class="btn btn-primary">Create</a>
</div>

<table class="table table-info">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswaList as $mahasiswa)
        <tr>
            <td>{{ $mahasiswa->id }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->jurusan }}</td>
            <td>
                <div class="d-flex gap-2">
                    <a class="btn btn-secondary" href="/mahasiswa/{{ $mahasiswa->id }}">Show</a>
                    <a class="btn btn-warning" href="/mahasiswa/{{ $mahasiswa->id }}/edit">Edit</a>
    
                    <form action="/mahasiswa/{{ $mahasiswa->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')">Delete</button>
                    </form>
                </div>  
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection