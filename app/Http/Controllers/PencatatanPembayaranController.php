<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanPembayaran;
use Illuminate\Support\Facades\DB;

class PencatatanPembayaranController extends Controller
{
    public function index()
    {
        $pencatatan = PencatatanPembayaran::all();
        return view('pencatatan.index', compact('pencatatan'));
    }

    public function create()
    {
        return view('pencatatan.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'hargaSewa' => 'required',
        'status' => 'required',
    ]);
    

    $pencatatan = PencatatanPembayaran::create($request->all());

    return redirect()->route('pencatatan')->with('sucess', 'pencatatan created sucessfully');
}
    public function edit($id)
    {
        $phi = PencatatanPembayaran::find($id);
        return view('pencatatan.edit', compact('phi'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'hargaSewa' => 'required',
        'status' => 'required',
    ]);

    $update = [
        'nama' => $request->nama,
        'nomor' => $request->nomor,
        'kamar' => $request->kamar,
        'hargaSewa' => $request->hargaSewa,
        'status' => $request->status,
    ];

    PencatatanPembayaran::whereId($id)->update($update);

    return redirect()->route('pencatatan')
        ->with('success', 'pencatatan updated successfully');
}

public function destroy($id)
{
    $phi = PencatatanPembayaran::find($id);
    $phi->delete();
    return redirect()->route('pencatatan')
        ->with('success', 'pencatatan deleted successfully');
}

}
