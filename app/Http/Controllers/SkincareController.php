<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skincare;

class SkincareController extends Controller
{
    // Menampilkan form tambah produk
    public function create()
    {
        return view('skincare'); // Pastikan nama view sesuai dengan file Blade Anda
    }

    // Menyimpan data produk baru
    // Menyimpan data produk baru
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'merk' => 'required|string|max:255',
        'kategori' => 'required|string',
        'cocok_untuk' => 'required|string',
        'harga' => 'required|numeric',
        'bahan' => 'required|string', // Mengganti dari 'value' ke 'bahan' tanpa unique
        'link' => 'required|string|max:255',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Menyimpan gambar
    if ($request->hasFile('gambar')) {
        $filename = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('images'), $filename);

        // Simpan data ke database
        Skincare::create([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'kategori' => $request->kategori,
            'cocok_untuk' => $request->cocok_untuk,
            'harga' => $request->harga,
            'bahan' => $request->bahan, // Mengganti dari 'value' ke 'bahan'
            'link' => $request->link,
            'gambar' => $filename,
        ]);
    }

    return redirect()->route('skincare.create')->with('success', 'Skincare berhasil ditambahkan.');
}


    // Menampilkan form edit produk
    public function edit($id)
    {
        // Cari produk berdasarkan id
        $product = Skincare::findOrFail($id);
        return view('edit-produk', compact('product')); // Pastikan nama view sesuai
    }

    // Mengupdate data produk
    public function update(Request $request, $id)
    {
        $product = Skincare::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'kategori' => 'required|string',
            'cocok_untuk' => 'required|string',
            'harga' => 'required|numeric',
            'bahan' => 'required|string', // Mengganti dari 'value' ke 'bahan' tanpa unique
            'link' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product->nama = $request->nama;
        $product->merk = $request->merk;
        $product->kategori = $request->kategori;
        $product->cocok_untuk = $request->cocok_untuk;
        $product->harga = $request->harga;
        $product->bahan = $request->bahan; // Mengganti dari 'value' ke 'bahan'
        $product->link = $request->link;
    
        if ($request->hasFile('gambar')) {
            if ($product->gambar && file_exists(public_path('images/' . $product->gambar))) {
                unlink(public_path('images/' . $product->gambar));
            }
            $filename = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('images'), $filename);
            $product->gambar = $filename;
        }
    
        $product->save();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }
    

    // Menghapus produk
    public function destroy($id)
    {
        $product = Skincare::findOrFail($id);

        // Hapus gambar jika ada
        if ($product->gambar && file_exists(public_path('images/' . $product->gambar))) {
            unlink(public_path('images/' . $product->gambar));
        }

        $product->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}
