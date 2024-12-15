<x-app-layout>
    <div class="container">
        <div class="header">
            <h1 class="title">Hasil Quiz Tipe Kulit Anda</h1>
            <p class="subtitle">Tipe Kulit Anda: <span class="highlight" id="skinType">{{ $skinType }}</span></p>
        </div>

        <h2 class="section-title">Produk yang Cocok untuk Kulit {{ $skinType }}</h2>

        <div class="product-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    @if($product->gambar)
                        <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama }}" class="product-image">
                    @else
                        <div class="no-image">Tidak ada gambar</div>
                    @endif

                    <div class="product-info">
                        <h3 class="product-name">{{ $product->nama }}</h3>
                        <p class="product-price">Harga: Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        <a href="{{ $product->link }}" target="_blank" class="product-link">Beli di Shoopoo</a>
                    </div>
                </div>
            @empty
                <p class="no-product">Tidak ada produk yang cocok untuk tipe kulit Anda saat ini.</p>
            @endforelse
        </div>

        <div class="back-button-container">
            <a href="{{ route('skincare.view') }}" class="back-button">Lihat Produk Lain</a>
        </div>
    </div>
    
    <!-- Modal Popup -->
    <div id="skinTypeModal" class="modal">
        <div class="modal-content">
            <h2>Informasi Tipe Kulit Anda</h2>
            <p id="modalContent"></p>
            <button id="closeButton">Tutup</button>
        </div>
    </div>
    
    <!-- Styling CSS -->
    <style>
        /* Container Utama */
/* Container Utama */
.container {
    width: 80%;
    margin: 0 auto;
    padding: 40px 0;
    text-align: center;
}

/* Header */
.header {
    margin-bottom: 30px;
}

.title {
    font-size: 2.5rem;
    color: #686F4E; /* Hijau Zaitun */
    font-weight: bold;
    margin-bottom: 10px;
}

.subtitle {
    font-size: 1.25rem;
    color: #333;
}

.highlight {
    color: #686F4E; /* Hijau Zaitun */
    font-weight: bold;
}

/* Section Title */
.section-title {
    font-size: 2rem;
    color: #686F4E; /* Hijau Zaitun */
    font-weight: bold;
    margin-bottom: 20px;
}

/* Grid Produk */
.product-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

/* Kartu Produk dengan Ukuran Tetap */
.product-card {
    width: 250px; /* Ukuran tetap */
    background-color: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s, box-shadow 0.2s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.product-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-bottom: 1px solid #e5e7eb;
}

.product-info {
    padding: 16px;
    text-align: center;
}

.product-name {
    font-size: 1.25rem;
    color: #686F4E; /* Hijau Zaitun */
    font-weight: bold;
    margin-bottom: 10px;
}

.product-price {
    font-size: 1rem;
    color: #555;
    margin-bottom: 15px;
}

.product-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #686F4E; /* Hijau Zaitun */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.product-link:hover {
    background-color: #5a6239; /* Hijau Zaitun Gelap */
}

/* Pesan Tidak Ada Produk */
.no-product {
    font-size: 1rem;
    color: #888;
    width: 100%;
    text-align: center;
}

/* Tombol Kembali */
.back-button-container {
    margin-top: 30px;
}

.back-button {
    display: inline-block;
    padding: 12px 25px;
    background-color: #686F4E; /* Hijau Zaitun */
    color: #fff;
    font-size: 1rem;
    border-radius: 8px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.back-button:hover {
    background-color: #5a6239; /* Hijau Zaitun Gelap */
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 9999;
    opacity: 0;
    animation: fadeIn 0.5s forwards; /* Animasi masuk modal */
}

.modal.active {
    display: flex;
    opacity: 1;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.modal-content {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    width: 80%;
    max-width: 600px;
    text-align: left; /* Mengatur teks agar rata kiri */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    animation: slideIn 0.5s ease-out; /* Animasi konten modal */
}

@keyframes slideIn {
    0% {
        transform: translateY(-30px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 20px;
    text-align: center; /* Judul tetap rata tengah */
}

.modal p {
    font-size: 1.2rem;
    color: #555;
    line-height: 1.6;
    margin-bottom: 30px;
}

.modal button {
    background: #686F4E; /* Hijau Zaitun */
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1rem;
    transition: background 0.3s;
    display: block;
    margin: 0 auto; /* Tombol rata tengah */
}

.modal button:hover {
    background: #5a6239; /* Hijau Zaitun Gelap */
}

    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const skinType = document.getElementById('skinType').innerText;
            const modal = document.getElementById('skinTypeModal');
            const modalContent = document.getElementById('modalContent');
            const closeButton = document.getElementById('closeButton');

            let message = "";
            if (skinType === "dry") {
                message = "Wah! ternyata kulit kamu termasuk Kulit Kering. Tipe kulit ini adalah tipe kulit yang kekurangan kelembaban. Biasanya, kulit jenis ini memiliki lapisan minyak alami yang sangat sedikit, sehingga menyebabkan kulit terasa kasar, kering, dan bahkan mengelupas.";
            } else if (skinType === "normal") {
                message = "Wah! ternyata kulit kamu termasuk Kulit Normal. Tipe kulit ini adalah jenis kulit yang seimbang, tidak terlalu berminyak atau kering. Kulit ini biasanya memiliki tekstur yang halus dan tidak terlalu banyak masalah kulit seperti jerawat atau kekeringan berlebih.";
            } else if (skinType === "oily") {
                message = "Wah! ternyata kulit kamu termasuk tipe Kulit Berminyak. Tipe kulit ini ditandai dengan produksi sebum (minyak) yang berlebihan. Kulit jenis ini sering tampak mengkilap dan memiliki pori-pori yang besar, sehingga lebih rentan terhadap jerawat dan komedo.";
            } else if (skinType === "acne") {
                message = "Wah! ternyata kulit kamu termasuk tipe Kulit Berjerawat. Tipe kulit ini adalah tipe kulit yang rentan terhadap masalah jerawat, komedo, dan peradangan. Kulit jenis ini sering dikaitkan dengan produksi minyak yang berlebihan atau kondisi hormonal yang memicu munculnya jerawat.";
            } else {
                message = "Tipe kulit tidak dikenali, silakan konsultasikan dengan ahli dermatologi untuk rekomendasi yang lebih tepat.";
            }

            modalContent.innerText = message;

            modal.classList.add('active');

            closeButton.addEventListener('click', function () {
                modal.classList.remove('active');
            });
        });
    </script>
</x-app-layout>
