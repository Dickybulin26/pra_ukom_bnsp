<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangController extends Controller
{
    //* menampilkan semua data barang
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = Barang::all();
        return view('index', compact('data'));
    }

    //* return view halaman tambah
    public function create()
    {
        return view('tambah');
    }

    //* simpan data barang yang diinput user
    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaBarang' => 'required',
                'stokBarang' => 'required',
                'hargaBarang' => 'required',
                'gambarBarang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // $gambarBarang = time() . $request->gambarBarang->extension();

            // Buat objek barang dan simpan
            $barang = new Barang();
            $barang->nama = $request->namaBarang;
            $barang->stok = $request->stokBarang;
            $barang->harga = $request->hargaBarang;
            // $barang->foto = $gambarBarang;
            if ($request->hasFile('gambarBarang')) {
                $file = $request->file('gambarBarang');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $barang->foto = $filename;
            }
            $barang->save();

            $massage = '<script>alert("Data berhasil ditambahkan")</script>';
            return redirect()->route('barang.index')->with('success', $massage);
        } catch (\Throwable $th) {
            dd($th);
            // Tangani error, bisa menggunakan flash message atau log
            return redirect()->route('barang.tambah')->with('error', "<script>alert('Terjadi kesalahan: " . $th->getMessage() . "')</script>");
        }
    }

    //* return view halaman detail
    public function showDetail($id)
    {
        $data = Barang::find($id);
        return view('detail', compact('data'));
    }

    //* return view halaman edit
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('edit', compact('barang'));
    }

    //* update data barang yang diedit user
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


    //* hapus data barang yang dihapus user
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/');
    }
}
