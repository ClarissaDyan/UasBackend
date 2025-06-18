<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PencatatanPembayaran;
use Illuminate\Support\Facades\DB;

class PencatatanPembayaranController extends Controller
{
    
    public function index(Request $request)
    {
        $query = PencatatanPembayaran::query();
        
        // Cek apakah ada parameter search
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nomor', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('kamar', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('hargaSewa', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('tanggal', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('status', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Cek apakah ada filter berdasarkan kolom spesifik
        if ($request->has('filter_by') && $request->has('filter_value') && !empty($request->filter_value)) {
            $filterBy = $request->filter_by;
            $filterValue = $request->filter_value;
            
            // Validasi kolom yang diizinkan untuk filter
            $allowedColumns = ['nama', 'nomor', 'kamar', 'hargaSewa', 'tanggal', 'status'];
            if (in_array($filterBy, $allowedColumns)) {
                $query->where($filterBy, 'LIKE', '%' . $filterValue . '%');
            }
        }
        
        // Urutkan berdasarkan nama secara default
        $query->orderBy('nama', 'asc');
        
        // Paginate hasil (opsional)
        $pembayaran = $query->paginate(10)->withQueryString();
        
        return view('pembayaran.index', compact('pembayaran'));
    }
    
    // Method khusus untuk search
    public function search(Request $request)
    {
        $searchTerm = $request->get('q');
        
        $query = PencatatanPembayaran::query();
        
        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('nomor', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('kamar', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('hargaSewa', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('tanggal', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('status', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        $query->orderBy('nama', 'asc');
        
        // Paginate hasil
        $pembayaran = $query->paginate(10)->withQueryString();
        
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
    

    $pembayaran = PencatatanPembayaran::create($request->all());

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
