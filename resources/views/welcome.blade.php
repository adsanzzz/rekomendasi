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
        a:hover, button:hover {
            transform: scale(1.05);
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
<body class="bg-[#EDE3C7] text-[#4A4A35] font-sans">

    <script>
        AOS.init();
    </script>

    <!-- Header -->
    <header class="sticky top-0 bg-[#686F4E] text-white shadow-md z-50">
        <div class="container mx-auto flex justify-between items-center py-6 px-4">
            <div class="text-2xl font-bold">LumiSkin</div>
            <nav class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-[#B6D7B6] transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-[#B6D7B6] transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-[#B6D7B6] transition">Register</a>
                        @endif
                    @endauth
                @endif
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="container mx-auto text-center py-60 px-4 custom-bg rounded-lg shadow-lg mt-10" data-aos="fade-up">
        <div class="bg-white/80 p-10 rounded-lg shadow">
            <h1 class="text-4xl font-bold text-[#686F4E]">Welcome to LumiSkin</h1>
            <p class="mt-4 text-lg text-gray-600">Website ini dapat membantu Anda menemukan jenis skincare yang cocok dengan kondisi wajah Anda saat ini.</p>
            <a href="{{ route('login') }}" class="inline-block mt-6 px-6 py-3 bg-[#B6D7B6] text-[#4A4A35] font-semibold rounded-full shadow hover:bg-[#9FC69B] transition">
                Login to try Quiz
            </a>
        </div>
    </section>

    <!-- Skin Types Section -->
    <section class="container mx-auto mt-16 px-4 py-16 bg-[#FFFFFF] rounded-lg shadow-lg text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-[#686F4E] mb-8">Jenis-Jenis Kulit</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 bg-[#B6D7B6] rounded-lg shadow">
                <h3 class="text-xl font-semibold text-[#4A4A35]">Kulit Kering</h3>
                <p class="mt-2 text-[#4A4A35]">Cenderung terasa kencang, kasar, dan terkadang mengelupas.</p>
            </div>
            <div class="p-6 bg-[#B6D7B6] rounded-lg shadow">
                <h3 class="text-xl font-semibold text-[#4A4A35]">Kulit Berminyak</h3>
                <p class="mt-2 text-[#4A4A35]">Menghasilkan minyak berlebih dan berisiko jerawat atau komedo.</p>
            </div>
            <div class="p-6 bg-[#B6D7B6] rounded-lg shadow">
                <h3 class="text-xl font-semibold text-[#4A4A35]">Kulit Kombinasi</h3>
                <p class="mt-2 text-[#4A4A35]">Kombinasi antara kulit berminyak di area T-zone dan kering di area lainnya.</p>
            </div>
        </div>
    </section>

    <!-- Header -->
<header class="bg-[#686F4E] text-white py-4">
    <h1 class="text-3xl font-bold text-center">Our Team</h1>
</header>

<!-- Features Section -->
<section id="features" class="container mx-auto mt-16 px-4 py-16 bg-[#EDE3C7]">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Backend Card -->
        <div class="bg-[#B6D7B6] p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-[#686F4E] text-center">Backend</h3>
            <img src="{{ asset('images/adit.jpeg') }}" alt="Backend" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto border-4 border-[#9FC69B]">
            <p class="mt-2 text-gray-700 text-center font-medium">Raja Dari Segala Raja</p>
            <button class="block mx-auto mt-4 bg-[#B6D7B6] text-[#686F4E] px-4 py-2 rounded hover:bg-[#9FC69B] transition duration-300">
                Learn More
            </button>
        </div>
        <!-- FrontEnd Card -->
        <div class="bg-[#B6D7B6] p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-[#686F4E] text-center">FrontEnd</h3>
            <img src="{{ asset('images/laudza.jpeg') }}" alt="FrontEnd" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto border-4 border-[#9FC69B]">
            <p class="mt-2 text-gray-700 text-center font-medium">Laudzaun</p>
            <button class="block mx-auto mt-4 bg-[#B6D7B6] text-[#686F4E] px-4 py-2 rounded hover:bg-[#9FC69B] transition duration-300">
                Learn More
            </button>
        </div>
        <!-- Designer Card 1 -->
        <div class="bg-[#B6D7B6] p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-[#686F4E] text-center">Designer</h3>
            <img src="{{ asset('images/jj.jpeg') }}" alt="Designer" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto border-4 border-[#9FC69B]">
            <p class="mt-2 text-gray-700 text-center font-medium">Jessica</p>
            <button class="block mx-auto mt-4 bg-[#B6D7B6] text-[#686F4E] px-4 py-2 rounded hover:bg-[#9FC69B] transition duration-300">
                Learn More
            </button>
        </div>
        <!-- Designer Card 2 -->
        <div class="bg-[#B6D7B6] p-6 rounded-lg shadow hover:shadow-lg transition duration-300">
            <h3 class="text-xl font-semibold text-[#686F4E] text-center">Designer</h3>
            <img src="{{ asset('images/justin.jpeg') }}" alt="Designer" class="w-[70%] h-[70%] object-cover rounded-full mb-4 mx-auto border-4 border-[#9FC69B]">
            <p class="mt-2 text-gray-700 text-center font-medium">Justice</p>
            <button class="block mx-auto mt-4 bg-[#B6D7B6] text-[#686F4E] px-4 py-2 rounded hover:bg-[#9FC69B] transition duration-300">
                Learn More
            </button>
        </div>
    </div>
</section>



    <!-- Testimonials Section -->
    <section class="container mx-auto mt-16 px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-semibold text-[#686F4E]">What Our Users Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-[#FFFFFF] p-6 rounded-lg shadow">
                <p class="italic text-gray-600">"LumiSkin sangat membantu saya menemukan produk skincare yang cocok. Hasilnya luar biasa!"</p>
                <h4 class="mt-4 text-[#686F4E] font-bold">- Refi</h4>
            </div>
            <div class="bg-[#FFFFFF] p-6 rounded-lg shadow">
                <p class="italic text-gray-600">"Prosesnya sangat mudah, dan hasilnya sesuai dengan kebutuhan kulit saya."</p>
                <h4 class="mt-4 text-[#686F4E] font-bold">- Bu Pecel</h4>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#686F4E] text-white py-8 mt-16">
        <div class="container mx-auto flex justify-center">
            <p class="text-sm">&copy; Lumi adalah bahasa latin dari CAHAYA, dan skin adalah KULIT</p>
        </div>
    </footer>
</body>
</html>
