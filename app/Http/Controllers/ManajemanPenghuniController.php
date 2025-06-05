<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemanPenghuni;
use Illuminate\Support\Facades\DB;

class ManajemanPenghuniController extends Controller
{
    public function index(Request $request)
    {
        $query = ManajemanPenghuni::query();
        
        // Cek apakah ada parameter search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nomor', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('kamar', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('masaSewa', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Cek apakah ada filter berdasarkan kolom spesifik
        if ($request->has('filter_by') && $request->has('filter_value') && !empty($request->filter_value)) {
            $filterBy = $request->filter_by;
            $filterValue = $request->filter_value;
            
            // Validasi kolom yang diizinkan untuk filter
            $allowedColumns = ['nama', 'nomor', 'kamar', 'masaSewa'];
            if (in_array($filterBy, $allowedColumns)) {
                $query->where($filterBy, 'LIKE', '%' . $filterValue . '%');
            }
        }
        
        // Urutkan berdasarkan nama secara default
        $query->orderBy('nama', 'asc');
        
        // Paginate hasil (opsional)
        $penghuni = $query->paginate(10)->withQueryString();
        
        return view('penghuni.index', compact('penghuni'));
    }
    
    // Method khusus untuk search
    public function search(Request $request)
    {
        $searchTerm = $request->get('q');
        
        $query = ManajemanPenghuni::query();
        
        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nomor', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('kamar', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('masaSewa', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        $query->orderBy('nama', 'asc');
        
        // Paginate hasil
        $penghuni = $query->paginate(10)->withQueryString();
        
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

        return redirect()->route('penghuni')->with('success', 'Penghuni berhasil ditambahkan');
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
            ->with('success', 'Penghuni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $phi = ManajemanPenghuni::find($id);
        $phi->delete();
        return redirect()->route('penghuni')
            ->with('success', 'Penghuni berhasil dihapus');
    }
}