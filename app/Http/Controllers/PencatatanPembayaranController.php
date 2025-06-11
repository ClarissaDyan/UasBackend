<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanPembayaran;
use Illuminate\Support\Facades\DB;

class PencatatanPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = PencatatanPembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'hargaSewa' => 'required',
        'tanggal' => 'required',
        'status' => 'required',
    ]);
    

    $pencatatan = PencatatanPembayaran::create($request->all());

    return redirect()->route('pembayaran')->with('sucess', 'pencatatan pembayaran created sucessfully');
}
    public function edit($id)
    {
        $phi = PencatatanPembayaran::find($id);
        return view('pembayaran.edit', compact('phi'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'hargaSewa' => 'required',
        'tanggal' => 'required',
        'status' => 'required',
    ]);

    $update = [
        'nama' => $request->nama,
        'nomor' => $request->nomor,
        'kamar' => $request->kamar,
        'hargaSewa' => $request->hargaSewa,
        'tanggal' => $request->tanggal,
        'status' => $request->status,
    ];

    PencatatanPembayaran::whereId($id)->update($update);

    return redirect()->route('pembayaran')
        ->with('success', 'pencatatan pembayaran updated successfully');
}

public function destroy($id)
{
    $phi = PencatatanPembayaran::find($id);
    $phi->delete();
    return redirect()->route('pembayaran')
        ->with('success', 'pencatatan pembayaran deleted successfully');
}

}
