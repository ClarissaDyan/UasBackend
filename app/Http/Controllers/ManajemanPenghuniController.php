<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManajemanPenghuni;
use Illuminate\Support\Facades\Auth;

class ManajemanPenghuniController extends Controller
{
    public function index(Request $request)
    {
        $query = ManajemanPenghuni::where('user_id', Auth::id());

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', "%$searchTerm%")
                  ->orWhere('nomor', 'LIKE', "%$searchTerm%")
                  ->orWhere('kamar', 'LIKE', "%$searchTerm%")
                  ->orWhere('masaSewa', 'LIKE', "%$searchTerm%");
            });
        }

        if ($request->has('filter_by') && $request->has('filter_value') && !empty($request->filter_value)) {
            $filterBy = $request->filter_by;
            $allowedColumns = ['nama', 'nomor', 'kamar', 'masaSewa'];
            if (in_array($filterBy, $allowedColumns)) {
                $query->where($filterBy, 'LIKE', '%' . $request->filter_value . '%');
            }
        }

        $query->orderBy('nama', 'asc');
        $penghuni = $query->paginate(10)->withQueryString();

        return view('penghuni.index', compact('penghuni'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->get('q');
        $query = ManajemanPenghuni::where('user_id', Auth::id());

        if (!empty($searchTerm)) {
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'LIKE', "%$searchTerm%")
                  ->orWhere('nomor', 'LIKE', "%$searchTerm%")
                  ->orWhere('kamar', 'LIKE', "%$searchTerm%")
                  ->orWhere('masaSewa', 'LIKE', "%$searchTerm%");
            });
        }

        $query->orderBy('nama', 'asc');
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

        ManajemanPenghuni::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'kamar' => $request->kamar,
            'masaSewa' => $request->masaSewa,
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('penghuni')->with('success', 'Penghuni berhasil ditambahkan');
    }

    public function edit($id)
    {
        $phi = ManajemanPenghuni::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

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

        $phi = ManajemanPenghuni::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $phi->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'kamar' => $request->kamar,
            'masaSewa' => $request->masaSewa,
        ]);

        return redirect()->route('penghuni')->with('success', 'Penghuni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $phi = ManajemanPenghuni::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $phi->delete();
        return redirect()->route('penghuni')->with('success', 'Penghuni berhasil dihapus');
    }
}
