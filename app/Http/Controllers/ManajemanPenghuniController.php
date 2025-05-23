<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemanPenghuni;
use Illuminate\Support\Facades\DB;

class ManajemanPenghuniController extends Controller
{
    public function index()
    {
        $penghuni = ManajemanPenghuni::all();
        return view('penghuni.index', compact('penghuni'));
    }

    public function create()
    {
        return view('penghuni.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'masaSewa' => 'required',
    ]);
    

    $penghuni = ManajemanPenghuni::create($request->all());

    return redirect()->route('penghuni')->with('sucess', 'penghuni created sucessfully');
}
    public function edit($id)
    {
        $phi = ManajemanPenghuni::find($id);
        return view('penghuni.edit', compact('phi'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nomor' => 'required',
        'kamar' => 'required',
        'masaSewa' => 'required',
    ]);

    $update = [
        'nama' => $request->nama,
        'nomor' => $request->nomor,
        'kamar' => $request->kamar,
        'masaSewa' => $request->masaSewa,
    ];

    ManajemanPenghuni::whereId($id)->update($update);

    return redirect()->route('penghuni')
        ->with('success', 'penghuni updated successfully');
}

public function destroy($id)
{
    $phi = ManajemanPenghuni::find($id);
    $phi->delete();
    return redirect()->route('penghuni')
        ->with('success', 'penghuni deleted successfully');
}

}
