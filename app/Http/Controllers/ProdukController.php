<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skincare;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Skincare::orderBy('kategori', 'desc')->get();
        return view('produk', compact('products')); // Mengirim data ke view 'produk'
    }
    public function skincareView()
{
    // Mengambil semua produk skincare dan mengelompokkan berdasarkan kategori
    $skincareByCategory = skincare::all()->groupBy('kategori');

    return view('skincareview', compact('skincareByCategory'));
}
}
