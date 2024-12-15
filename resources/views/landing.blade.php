<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LumiSkin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        a:hover {
            transform: scale(1.05);
            transition: transform 0.2s ease-in-out;
        }
        button:hover {
            transform: scale(1.1);
            transition: transform 0.2s ease-in-out;
        }
        .custom-bg {
    background-image: url('/images/background.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
    </style>
</head>
<body class="bg-pink-50 text-gray-800 font-sans">
    <script>
        AOS.init();
    </script>
</head>
<body>
<!-- Hero Section -->
<section class="container mx-auto text-center py-60 px-4 custom-bg rounded-lg shadow-lg" data-aos="fade-up">
    <div class="bg-white/70 p-10 rounded-lg">
        <h1 class="text-4xl font-bold text-pink-500">Try Our Quiz Now</h1>
        <p class="mt-4 text-lg text-gray-600">Website ini dapat membantu anda menemukan jenis skincare yang cocok dengan kondisi wajah anda saat ini.</p>
        <a href="{{ route('login') }}" class="inline-block mt-6 px-6 py-3 bg-pink-500 text-white font-semibold rounded-full shadow-md hover:bg-pink-600 transition">Quiz Now</a>
    </div>
</section>

    <!-- Products Section -->
<section id="products" class="container mx-auto mt-16 px-4 py-16 bg-white rounded-lg shadow-lg text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-pink-500 mb-8">Sponsored By Avoskin</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="{{ asset('images/product1.jpg') }}" alt="Produk 1" class="w-full h-70 object-cover rounded mb-4">
            <h3 class="text-xl font-semibold text-pink-600">Toner</h3>
            <p class="mt-2 text-gray-600">Membersihkan wajah dengan lembut tanpa membuat kulit kering.</p>
            <span class="block mt-4 text-pink-500 font-bold">Rp150.000</span>
            <a href="https://www.avoskinbeauty.com/product/travel-toner-avoskin-miraculous-refining-20-ml-aha-bha-pha-eksfoliasi" class="mt-4 inline-block px-6 py-3 bg-pink-500 text-white font-semibold rounded-full hover:bg-pink-600 transition">Lihat Detail</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="{{ asset('images/product2.jpg') }}" alt="Produk 2" class="w-full h-70 object-cover rounded mb-4">
            <h3 class="text-xl font-semibold text-pink-600">Serum Pencerah</h3>
            <p class="mt-2 text-gray-600">Mencerahkan kulit kusam dan meratakan warna kulit.</p>
            <span class="block mt-4 text-pink-500 font-bold">Rp250.000</span>
            <a href="https://www.avoskinbeauty.com/product/serum-avoskin-your-skin-bae-niacinamide-30-ml-mencerahkan-kulit" class="mt-4 inline-block px-6 py-3 bg-pink-500 text-white font-semibold rounded-full hover:bg-pink-600 transition">Lihat Detail</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <img src="{{ asset('images/produk6.jpg') }}" alt="Produk 3" class="w-full h-70 object-cover rounded mb-4">
            <h3 class="text-xl font-semibold text-pink-600">Moisturizer</h3>
            <p class="mt-2 text-gray-600">Menghidrasi kulit sepanjang hari tanpa terasa lengket.</p>
            <span class="block mt-4 text-pink-500 font-bold">Rp200.000</span>
            <a href="https://www.avoskinbeauty.com/product/your-skin-bae-acne-pores-savior-balm-stick-8-5-g" class="mt-4 inline-block px-6 py-3 bg-pink-500 text-white font-semibold rounded-full hover:bg-pink-600 transition">Lihat Detail</a>
        </div>
    </div>
</section>


    <!-- Skin Types Section -->
    <section id="skin-types" class="container mx-auto mt-16 px-4 py-16 bg-white rounded-lg shadow-lg text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-pink-500 mb-8">Jenis-Jenis Kulit</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-pink-100 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-pink-600">Kulit Kering</h3>
                <p class="mt-2 text-gray-600">Cenderung terasa kencang, kasar, dan terkadang mengelupas.</p>
            </div>
            <div class="p-6 bg-pink-100 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-pink-600">Kulit Berminyak</h3>
                <p class="mt-2 text-gray-600">Menghasilkan minyak berlebih dan berisiko jerawat atau komedo.</p>
            </div>
            <div class="p-6 bg-pink-100 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-pink-600">Kulit Kombinasi</h3>
                <p class="mt-2 text-gray-600">Kombinasi antara kulit berminyak di area T-zone dan kering di area lainnya.</p>
            </div>
            <div class="p-6 bg-pink-100 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-pink-600">Kulit Sensitif</h3>
                <p class="mt-2 text-gray-600">Mudah iritasi terhadap produk tertentu atau faktor lingkungan.</p>
            </div>
            <div class="p-6 bg-pink-100 rounded-lg shadow">
                <h3 class="text-xl font-semibold text-pink-600">Kulit Normal</h3>
                <p class="mt-2 text-gray-600">Seimbang antara kadar minyak dan kelembaban, jarang mengalami masalah.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="container mx-auto mt-16 px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-semibold text-pink-500">What Our Users Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="italic text-gray-600">"LumiSkin sangat membantu saya menemukan produk skincare yang cocok. Hasilnya luar biasa!"</p>
                <h4 class="mt-4 text-pink-500 font-bold">- Amanda</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="italic text-gray-600">"Prosesnya sangat mudah, dan hasilnya sesuai dengan kebutuhan kulit saya."</p>
                <h4 class="mt-4 text-pink-500 font-bold">- Riana</h4>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="italic text-gray-600">"Website ini sangat inovatif dan membantu. Saya merekomendasikannya kepada teman-teman saya."</p>
                <h4 class="mt-4 text-pink-500 font-bold">- Daniel</h4>
            </div>
        </div>
    </section>

    <section id="features" class="container mx-auto mt-16 px-4" data-aos="fade-up">
        <h2 class="text-3xl font-semibold text-pink-500 text-center">Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-pink-500 text-center">Backend</h3>
                <img src="{{ asset('images/adit.jpeg') }}" alt="Backend" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto">
                <p class="mt-2 text-gray-600 text-center">Raja Dari Segala Raja</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-pink-500 text-center">FrontEnd</h3>
                <img src="{{ asset('images/laudza.jpeg') }}" alt="FrontEnd" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto">
                <p class="mt-2 text-gray-600 text-center">Laudzaun</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-pink-500 text-center">Designer</h3>
                <img src="{{ asset('images/jj.jpeg') }}" alt="Designer" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto">
                <p class="mt-2 text-gray-600 text-center">Jessica</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                <h3 class="text-xl font-semibold text-pink-500 text-center">Designer</h3>
                <img src="{{ asset('images/justin.jpeg') }}" alt="Designer" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto">
                <p class="mt-2 text-gray-600 text-center">Justice</p>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-pink-500 text-white py-8 mt-16">
        <div class="container mx-auto flex flex-col md:flex-row justify-center">
            <p class="text-sm">&copy; Lumi adalah bahasa latin dari CAHAYA, dan skin adalah KULIT</p>
            <nav class="flex space-x-4 mt-4 md:mt-0">
                
</body>
</html>
</x-app-layout>