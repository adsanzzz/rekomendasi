<x-app-layout>
    <style>
       /* Styling Utama */
.py-12 {
    padding: 48px 0;
    background-color: #f3f4f6; /* Warna latar belakang abu-abu terang */
}

.max-w-7xl {
    max-width: 800px;
    margin: 0 auto;
}

.bg-white {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
    padding: 24px;
}

.text-gray-900 {
    color: #2d3748; /* Warna teks abu gelap */
}

/* Header Form */
h1 {
    font-size: 24px;
    color: #1a202c; /* Warna abu tua */
    border-bottom: 2px solid #e2e8f0; /* Garis bawah header */
    padding-bottom: 8px;
}

/* Label */
label {
    font-size: 14px;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 4px;
    display: block;
}

/* Tombol */
.button-submit button {
    background-color: #f6ad55; /* Warna kuning oranye */
    color: #2c5282; /* Warna teks biru */
    font-size: 16px;
    font-weight: bold;
    padding: 12px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.button-submit button:hover {
    background-color: #48bb78; /* Warna hijau saat hover */
    transform: scale(1.05); /* Efek zoom ringan */
}

.button-submit button:active {
    transform: scale(0.98); /* Efek klik */
}

/* Responsif */
@media (max-width: 768px) {
    .max-w-7xl {
        padding: 16px;
    }

    input,
    select {
        font-size: 14px;
        padding: 8px 10px;
    }

    .button-submit button {
        font-size: 14px;
        padding: 10px 14px;
    }
}


    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Form Tambah Jenis Skincare</h1>
                    <form action="{{ route('skincare.store') }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- Token CSRF untuk keamanan -->

                    <!-- Nama Produk -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium">Nama Produk</label>
                        <input type="text" name="nama" id="nama" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Merek -->
                    <div class="mb-4">
                        <label for="merk" class="block text-sm font-medium">Merek</label>
                        <input type="text" name="merk" id="merk" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Kategori -->
                    <div class="mb-4">
                        <label for="kategori" class="block text-sm font-medium">Kategori</label>
                        <select name="kategori" id="kategori" class="w-full px-4 py-2 border rounded" required>
                            <option value="moisturizer">Moisturizer</option>
                            <option value="face wash">Face Wash</option>
                            <option value="serum">Serum</option>
                            <option value="sunscreen">Sunscreen</option>
                            <option value="toner">Toner</option>
                            <option value="micellar">Micellar</option>
                        </select>
                    </div>

                    <!-- Cocok Untuk -->
                    <div class="mb-4">
                        <label for="cocok_untuk" class="block text-sm font-medium">Cocok Untuk</label>
                        <select name="cocok_untuk" id="cocok_untuk" class="w-full px-4 py-2 border rounded" required>
                            <option value="oily">Oily</option>
                            <option value="normal">Normal</option>
                            <option value="dry">Dry</option>
                            <option value="acne">Acne</option>
                            <option value="dry to oily">Dry to Oily</option>
                        </select>
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium">Harga</label>
                        <input type="number" name="harga" id="harga" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Value -->
                    <div class="mb-4">
                        <label for="bahan" class="block text-sm font-medium">Bahan</label>
                        <input type="text" name="bahan" id="bahan" class="w-full px-4 py-2 border rounded" required>
                    </div>
                    <!-- link -->
                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium">link</label>
                        <input type="text" name="link" id="link" class="w-full px-4 py-2 border rounded" required>
                    </div>

                    <!-- Input Gambar -->
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium">Upload Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="w-full px-4 py-2 border rounded" accept="image/*" required>

                    </div>

                    <!-- Tombol Submit -->
                     <div class="button-submit">
                    <button type="submit" class="px-6 py-2 bg-yellow-500 text-blue font-semibold rounded hover:bg-green-600 transition">
                        Submit
                    </button>
                    </div>

                    <!-- Lihat Produk -->
                    
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
