<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa', [
            'mahasiswaList' => $mahasiswa
        ]);
        // $mahasiswaList = Mahasiswa::latest()->paginate(5);
        // return view('mahasiswa',compact('mahasiswaList'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validateData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $uploadedImage = $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;

        $data = $request->all();

        if ($uploadedImage) {
            $data['image'] = $imagePath;
        }

        Mahasiswa::create($data);
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa-show', [
            'mahasiswaList' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
        return view('mahasiswa-edit', [
            'mahasiswaList' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'jurusan' => 'required'
        ]);

        $namaFotoLama = $mahasiswa->image;

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->getClientOriginalExtension();
            $uploadedImage = $request->foto->move(public_path('images'), $imageName);
            $namaFotoLama = 'images/' . $imageName;
        }

        $mahasiswa->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jurusan' => $request->jurusan,
            'image' => $namaFotoLama
        ]);

        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $images = File::delete(public_path('images'), $mahasiswa->image);
        // Storage::delete('public/images/'.$mahasiswa->image);
        $mahasiswa->delete();
        return redirect('/mahasiswa');
    }
}
