<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Barang::all();
        return view('index', compact('data'));
    }

    public function create()
    {
        return view('tambah');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaBarang' => 'required',
                'stokBarang' => 'required',
                'hargaBarang' => 'required',
            ]);

            // Buat objek barang dan simpan
            $barang = new Barang();
            $barang->nama = $request->namaBarang;
            $barang->stok = $request->stokBarang;
            $barang->harga = $request->hargaBarang;
            $barang->save();

            $massage = '<script>alert("Data berhasil ditambahkan")</script>';
            return redirect()->route('barang.index')->with('success', $massage);
        } catch (\Throwable $th) {
            // Tangani error, bisa menggunakan flash message atau log
            return redirect()->route('barang.tambah')->with('error', "<script>alert('Terjadi kesalahan: " . $th->getMessage() . "')</script>");
        }
    }


    public function showDetail($id)
    {
        $data = Barang::find($id);
        return view('detail', compact('data'));
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'stok' => 'required',
                'harga' => 'required',
            ]);

            $barang = Barang::findOrFail($id);
            $barang->nama = $request->nama;
            $barang->stok = $request->stok;
            $barang->harga = $request->harga;
            $barang->save();

            return redirect()->route('barang.index')->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {
            return redirect()->route('barang.index')->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }


    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/');
    }
}
