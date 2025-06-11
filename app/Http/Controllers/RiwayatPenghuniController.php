<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPenghuni;
use Illuminate\Support\Facades\DB;

class RiwayatPenghuniController extends Controller
{
    public function index(Request $request)
    {
        $query = RiwayatPenghuni::query();
        
        // Filter berdasarkan tanggal masuk
        if ($request->filled('filter_tanggal_masuk_dari')) {
            $query->where('tanggal_masuk', '>=', $request->filter_tanggal_masuk_dari);
        }
        
        if ($request->filled('filter_tanggal_masuk_sampai')) {
            $query->where('tanggal_masuk', '<=', $request->filter_tanggal_masuk_sampai);
        }
        
        // Filter berdasarkan tanggal keluar
        if ($request->filled('filter_tanggal_keluar_dari')) {
            $query->where('tanggal_keluar', '>=', $request->filter_tanggal_keluar_dari);
        }
        
        if ($request->filled('filter_tanggal_keluar_sampai')) {
            $query->where('tanggal_keluar', '<=', $request->filter_tanggal_keluar_sampai);
        }
        
        $riwayat_penghuni = $query->orderBy('created_at', 'desc')->get();
        
        return view('riwayat_penghuni.index', compact('riwayat_penghuni'));
    }

    // Fungsi khusus untuk filter tanggal masuk
    public function filterByTanggalMasuk(Request $request)
    {
        $query = RiwayatPenghuni::query();
        
        if ($request->filled('dari')) {
            $query->where('tanggal_masuk', '>=', $request->dari);
        }
        
        if ($request->filled('sampai')) {
            $query->where('tanggal_masuk', '<=', $request->sampai);
        }
        
        $riwayat_penghuni = $query->orderBy('tanggal_masuk', 'desc')->get();
        
        return view('riwayat_penghuni.index', compact('riwayat_penghuni'));
    }
    
    // Fungsi khusus untuk filter tanggal keluar
    public function filterByTanggalKeluar(Request $request)
    {
        $query = RiwayatPenghuni::query();
        
        if ($request->filled('dari')) {
            $query->where('tanggal_keluar', '>=', $request->dari);
        }
        
        if ($request->filled('sampai')) {
            $query->where('tanggal_keluar', '<=', $request->sampai);
        }
        
        $riwayat_penghuni = $query->orderBy('tanggal_keluar', 'desc')->get();
        
        return view('riwayat_penghuni.index', compact('riwayat_penghuni'));
    }
    
    // Fungsi untuk reset filter
    public function resetFilter()
    {
        return redirect()->route('riwayat_penghuni');
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