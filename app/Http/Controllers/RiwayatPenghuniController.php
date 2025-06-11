<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPenghuni;
use Illuminate\Support\Facades\DB;

class RiwayatPenghuniController extends Controller
{
    public function index()
    {
        $riwayat_penghuni = RiwayatPenghuni::all();
        return view('riwayat_penghuni.index', compact('riwayat_penghuni'));
    }

    public function create()
    {
        return view('riwayat_penghuni.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'alasan' => 'required',
        'tanggal_masuk' => 'required|date',
        'tanggal_keluar' => 'required|date',
    ]);


    $riwayat_penghuni = RiwayatPenghuni::create($request->all());

    return redirect()->route('riwayat_penghuni')->with('success', 'Riwayat penghuni created successfully');
}
    public function edit($id)
    {
        $phi = RiwayatPenghuni::find($id);
        return view('riwayat_penghuni.edit', compact('phi'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'alasan' => 'required',
        'tanggal_masuk' => 'required|date',
        'tanggal_keluar' => 'required|date',
    ]);

    $update = [
        'nama' => $request->nama,
        'nomor' => $request->nomor,
        'kamar' => $request->kamar,
        'alasan' => $request->alasan,
        'tanggal_masuk' => $request->tanggal_masuk,
        'tanggal_keluar' => $request->tanggal_keluar,
    ];

    RiwayatPenghuni::whereId($id)->update($update);

    return redirect()->route('riwayat_penghuni')
        ->with('success', 'Riwayat penghuni updated successfully');
}

public function destroy($id)
{
    $phi = RiwayatPenghuni::find($id);
    $phi->delete();
    return redirect()->route('riwayat_penghuni')
        ->with('success', 'Riwayat penghuni deleted successfully');
}

}