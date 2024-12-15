<x-app-layout>
    <style>
/* Tombol Pink */
.btn-pink {
    display: inline-block;
    margin-top: 1rem;
    padding: 10px 20px;
    background-color: #686F4E;
    color: #fff;
    font-weight: bold;
    font-size: 16px;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

.btn-pink:hover {
    background-color: grey;
}

/* Container Kategori */
.category-container {
    margin-bottom: 2rem;
    position: relative;
    overflow: visible;
}

/* Judul Kategori */
.category-title {
    margin-bottom: 1rem;
    font-size: 1.75rem;
    font-weight: bold;
    color: #333;
}

/* Container Produk (Scroll) */
.product-container {
    display: flex;
    overflow-x: auto;
    gap: 20px;
    padding-bottom: 2rem;
    position: relative;
    min-height: 420px; /* Menyesuaikan dengan tinggi produk */
}

/* Card Produk */
.product-card {
    flex: 0 0 400px; /* Lebar default diperbesar */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Gambar Produk */
.product-card img {
    width: 100%; /* Memenuhi lebar card */
    height: 360px; /* Tinggi diperbesar agar lebih jelas */
    object-fit: cover;
    border-bottom: 1px solid #e5e7eb;
}

.product-card .product-info {
    padding: 16px;
    text-align: center;
}
.product-suitability {
    font-size: 1rem; /* Ukuran teks besar */
    font-weight: bold;  /* Teks tebal */
    color: #333;        /* Warna teks */
    margin-top: 0.5rem; /* Jarak atas */
}
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                @forelse($skincareByCategory as $kategori => $products)
                    <div class="category-container">
                        <!-- Judul Kategori -->
                        <h3 class="category-title">{{ $kategori }}</h3>

                        <!-- Container Produk (Scroll Horizontal) -->
                        <div class="product-container">
                            @foreach($products as $product)
                                <!-- Card Produk -->
                                <div class="product-card">
    @if($product->gambar)
        <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama }}">
    @else
        <div class="flex items-center justify-center w-full h-48 bg-gray-200">
            <span class="text-gray-500">Tidak ada gambar</span>
        </div>
    @endif

    <div class="product-info">
        <h4 class="text-lg font-semibold text-gray-700">{{ $product->nama }}</h4>
        <p class="product-suitability">Cocok untuk {{ $product->cocok_untuk ?? 'Informasi tidak tersedia' }} Skin</p>
        <p class="text-gray-1000">Rp{{ number_format($product->harga, 0, ',', '.') }}</p>
        <a href="{{ $product->link }}" target="_blank" rel="noopener noreferrer" class="btn-pink">Beli di Shoope</a>
    </div>
</div>

                                <!-- End Card Produk -->
                            @endforeach
                        </div>
                        <!-- End Container Produk -->
                    </div>
                @empty
                    <p class="text-center text-gray-500">Tidak ada produk skincare yang ditemukan.</p>
                @endforelse
            </div>
        </div>
    </div>

    @if (auth()->user()->role !== 'user')
        <div class="mt-6 text-center">
            <a href="{{ route('skincare.create') }}" class="inline-block px-6 py-2 bg-red-500 text-black font-semibold rounded shadow hover:bg-yellow-600 transition mb-4">
                Tambah Jenis Skincare
            </a>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('produk.index') }}" class="inline-block px-6 py-2 bg-yellow-500 text-black font-semibold rounded shadow hover:bg-yellow-600 transition">
                Control Produk
            </a>
        </div>
    @endif
</x-app-layout>
