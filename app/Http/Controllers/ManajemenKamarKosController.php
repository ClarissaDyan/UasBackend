<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemenKamarKos;
use Illuminate\Support\Facades\DB; 

class ManajemenKamarKosController extends Controller
{
    //Fungsi untuk memunculkan data yang ada di database
    public function index()
    {
        $kamarkos = ManajemenKamarKos::all();
        return view('kamarkos.index', compact('kamarkos'));
    }

    //Fungsi untuk memunculkan form tambah data
    public function create()
    {
        return view('kamarkos.create');
    }

    //Fungsi untuk menyimpan data ke dalam database
    public function store(Request $request) 
    {
        $request->validate([
            'nomorkamar' => 'required',
            'status' => 'required',
            'hargaSewa' => 'required',
            'fasilitas' => 'required',
        ]);

    $kamarkos = ManajemenKamarKos::create($request->all());

    return redirect()->route('kamarkos')->with('success', 'Detail kamar kos created successfully');
    }

    //Fungsi untuk memunculkan form edit
    public function edit($id)
    {
        $kamarkos = ManajemenKamarKos::find($id);
        return view('kamarkos.edit', compact('kamarkos'));
    }

    //Fungsi untuk mengubah data yang sudah ada di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomorkamar' => 'required',
            'status' => 'required',
            'hargaSewa' => 'required',
            'fasilitas' => 'required',
        ]);

        $update = [
            'nomorkamar' => $request->nomorkamar,
            'status' => $request->status,
            'hargaSewa' => $request->hargaSewa,
            'fasilitas' => $request->fasilitas,
        ];

        ManajemenKamarKos::whereId($id)->update($update);

        return redirect()->route('kamarkos')
            ->with('success', 'Detail Kamar Kos updated successfully');
    }

    //Fungsi untuk menghapus data yang ada di database
    public function destroy($id)
    {
        $kamarkos = ManajemenKamarKos::find($id);
        $kamarkos->delete();
        return redirect()->route('kamarkos')
            ->with('success', 'Detail Kamar Kos deleted successfully');
    }

}
