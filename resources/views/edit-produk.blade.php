<x-app-layout>
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('produk.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700">Nama:</label>
                            <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-md" value="{{ $product->nama }}">
                        </div>

                        <div class="mb-4">
                            <label for="merk" class="block text-gray-700">Merk:</label>
                            <input type="text" name="merk" id="merk" class="w-full border-gray-300 rounded-md" value="{{ $product->merk }}">
                        </div>

                        <!-- Edit Kategori -->
<div class="mb-4">
    <label for="kategori" class="block text-gray-700">Kategori:</label>
    <select name="kategori" id="kategori" class="w-full px-4 py-2 border rounded" required>
        <option value="moisturizer" {{ $product->kategori == 'moisturizer' ? 'selected' : '' }}>Moisturizer</option>
        <option value="face wash" {{ $product->kategori == 'face wash' ? 'selected' : '' }}>Face Wash</option>
        <option value="serum" {{ $product->kategori == 'serum' ? 'selected' : '' }}>Serum</option>
        <option value="sunscreen" {{ $product->kategori == 'sunscreen' ? 'selected' : '' }}>Sunscreen</option>
        <option value="toner" {{ $product->kategori == 'toner' ? 'selected' : '' }}>Toner</option>
        <option value="micellar" {{ $product->kategori == 'micellar' ? 'selected' : '' }}>Micellar</option>
    </select>
</div>

<!-- Edit Cocok Untuk -->
<div class="mb-4">
    <label for="cocok_untuk" class="block text-gray-700">Cocok Untuk:</label>
    <select name="cocok_untuk" id="cocok_untuk" class="w-full px-4 py-2 border rounded" required>
        <option value="oily" {{ $product->cocok_untuk == 'oily' ? 'selected' : '' }}>Oily</option>
        <option value="normal" {{ $product->cocok_untuk == 'normal' ? 'selected' : '' }}>Normal</option>
        <option value="dry" {{ $product->cocok_untuk == 'dry' ? 'selected' : '' }}>Dry</option>
        <option value="acne" {{ $product->cocok_untuk == 'acne' ? 'selected' : '' }}>Acne</option>
        <option value="dry to oily" {{ $product->cocok_untuk == 'dry to oily' ? 'selected' : '' }}>Dry to Oily</option>
    </select>
</div>


                        <div class="mb-4">
                            <label for="harga" class="block text-gray-700">Harga:</label>
                            <input type="number" name="harga" id="harga" class="w-full border-gray-300 rounded-md" value="{{ $product->harga }}">
                       
                        <!-- Input Value Produk -->
                        <div class="mb-4">
                            <label for="bahan" class="block text-gray-700">Bahan:</label>
                            <input type="text" name="bahan" id="bahan" class="w-full border-gray-300 rounded-md" value="{{ $product->value }}" required>
                        </div>
                        </div>
                          <!-- Input Value Produk -->
                          <div class="mb-4">
                            <label for="link" class="block text-gray-700">link:</label>
                            <input type="text" name="link" id="link" class="w-full border-gray-300 rounded-md" value="{{ $product->link }}" required>
                        </div>
                      


                        <div class="mb-4">
    <label for="gambar" class="block text-gray-700">Gambar Produk:</label>
    <input type="file" name="gambar" id="gambar" class="w-full border-gray-300 rounded-md">
    @if($product->gambar)
        <p class="mt-2">Gambar saat ini:</p>
        <!-- Tambahkan ukuran gambar agar seragam -->
        <img src="{{ asset('images/' . $product->gambar) }}" 
             alt="{{ $product->nama }}" 
             style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px;">
    @endif
</div>

                        <div class="mb-4">
                            <button type="submit" class="bg-yellow-500 text-red px-4 py-2 rounded-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
