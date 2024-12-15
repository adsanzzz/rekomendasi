<x-app-layout>
    <style>

/* Container Utama */
.container {
    width: 90%;
    margin: 0 auto;
    padding: 20px 0;
}

/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    font-family: Arial, sans-serif;
    text-align: left;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

thead tr {
    background-color: #686F4E; /* Hijau Zaitun */
    color: white;
}

th, td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

img {
    display: block;
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

/* Tombol */
a, button {
    text-decoration: none;
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
}

a.text-blue-500 {
    color: #2196F3;
    font-weight: bold;
}

a.text-blue-500:hover {
    color: #0d47a1;
    text-decoration: underline;
}

button.text-red-500 {
    background-color: #686F4E; /* Hijau Zaitun */
    color: #fff;
    border: none;
    font-weight: bold;
    padding: 8px 12px;
    transition: background-color 0.3s;
}

button.text-red-500:hover {
    background-color: #5a6239; /* Hijau Zaitun Gelap */
}

/* Tombol Tambah Skincare */
.mt-6.text-center a {
    background-color: #686F4E; /* Hijau Zaitun */
    color: white;
    font-weight: bold;
    padding: 12px 25px;
    display: inline-block;
    transition: background-color 0.3s, transform 0.2s;
    text-transform: uppercase;
}

.mt-6.text-center a:hover {
    background-color: #5a6239; /* Hijau Zaitun Gelap */
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Responsif */
@media (max-width: 768px) {
    table {
        font-size: 14px;
    }

    th, td {
        padding: 8px 10px;
    }
}

</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Merk</th>
                                <th class="border px-4 py-2">Kategori</th>
                                <th class="border px-4 py-2">Cocok Untuk</th>
                                <th class="border px-4 py-2">Bahan</th>
                                <th class="border px-4 py-2">Harga</th>
                                <th class="border px-4 py-2">link</th>
                                <th class="border px-4 py-2">Gambar</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $product->nama }}</td>
                                    <td class="border px-4 py-2">{{ $product->merk }}</td>
                                    <td class="border px-4 py-2">{{ $product->kategori }}</td>
                                    <td class="border px-4 py-2">{{ $product->cocok_untuk }}</td>
                                    <td class="border px-4 py-2">{{ $product->bahan }}</td>
                                    <td class="border px-4 py-2">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $product->link }}</td>
                                    <td class="border px-4 py-2">
                                        @if($product->gambar)
                                            <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama }}" class="w-20 h-20 object-cover">
                                        @else
                                            Tidak ada gambar
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('produk.edit', ['id' => $product->id]) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('produk.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-6 bg-black">
        </div>
    </div>
    @if (auth()->user()->role !== 'user')
        <div class="mt-6 text-center">
            <a href="{{ route('skincare.create') }}" class="inline-block px-6 py-2 bg-red-500 text-black font-semibold rounded shadow hover:bg-yellow-600 transition mb-4">
                Tambah Jenis Skincare
            </a>
        </div>
        
    @endif                
</x-app-layout>
