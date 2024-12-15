<x-app-layout>  
<style>
        /* Menambahkan font umum untuk tampilan modern */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F0F3E1; /* Latar belakang berwarna hijau zaitun lembut */
            color: #333; /* Warna teks yang gelap untuk kontras yang baik */
            margin: 0;
            padding: 0;
        }

        /* Mengatur agar form berada di tengah layar */
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Styling untuk form */
        form {
            background-color: #fff; /* Latar belakang putih untuk form */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan halus */
            padding: 30px;
            max-width: 800px; /* Membuat lebar form lebih besar */
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Card untuk setiap soal */
        form div {
            background-color: #F5F8ED; /* Warna latar belakang card hijau zaitun lembut */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Styling untuk label pertanyaan */
        form p {
            font-size: 1.2rem;
            color: #6B8E23; /* Warna hijau zaitun pada teks pertanyaan */
            margin-bottom: 10px;
        }

        /* Styling untuk select input */
        select {
            width: 100%; /* Menambahkan agar dropdown memenuhi lebar card */
            padding: 12px; /* Menambahkan padding yang lebih besar untuk dropdown */
            font-size: 1rem;
            border: 2px solid #6B8E23; /* Border hijau zaitun */
            border-radius: 5px;
            outline: none;
            background-color: #F0F3E1;
            transition: border-color 0.3s ease;
        }

        /* Menambahkan efek saat focus pada select */
        select:focus {
            border-color: #8FBC8F; /* Ganti border menjadi warna hijau pastel lebih cerah saat focus */
        }

        /* Styling tombol submit */
        button {
            background-color: #6B8E23; /* Latar belakang tombol hijau zaitun */
            color: white; /* Warna teks putih */
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efek hover pada tombol */
        button:hover {
            background-color: #8FBC8F; /* Warna hijau lebih cerah saat hover */
            transform: scale(1.05);
        }
    </style>


    <div class="centered-form">
        <div>

            <form action="{{ route('quiz.calculate') }}" method="POST">
                @csrf

                <!-- Pertanyaan langsung didefinisikan di sini -->
                <div>
                    <p>Seberapa sering melakukan aktivitas di bawah terik matahari ?</p>
                    <select name="answers[oily]" required>
                        <option value="1"></option>
                        <option value="1">Jarang</option>
                        <option value="2">Cukup sering</option>
                        <option value="3">Sering</option>
                        <option value="4">Selalu</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa banyak produksi keringat di muka anda pada siang hari?</p>
                    <select name="answers[oily]" required>
                        <option value="1"></option>
                        <option value="1">Tidak Banyak</option>
                        <option value="2">Normal</option>
                        <option value="3">Cukup Banyak</option>
                        <option value="4">Sangat Banyak</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa sering kulit Anda terasa berminyak?</p>
                    <select name="answers[oily]" required>
                        <option value="1"></option>
                        <option value="1">Tidak Pernah</option>
                        <option value="2">Kadang-kadang</option>
                        <option value="3">Sering</option>
                        <option value="4">Sangat Sering</option>
                    </select>
                </div>
                
                <div>
                    <p>Seberapa sering anda Beraktivitas di ruangan ber ac ?</p>
                    <select name="dry[]" required>
                        <option value="1"></option>
                        <option value="4">Selalu</option>
                        <option value="3">Sering</option>
                        <option value="2">Jarang</option>
                        <option value="1">Tidak Pernah</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa sering anda Cucimuka?</p>
                    <select name="dry[]" required>
                        <option value="1"></option>
                        <option value="1">Selalu</option>
                        <option value="2">Sering</option>
                        <option value="3">Jarang</option>
                        <option value="4">Tidak Pernah</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa Sering kulit anda terasa panas sehabis cuci muka?</p>
                    <select name="answers[normal]" required>
                        <option value="1"></option>
                        <option value="1">Selalu</option>
                        <option value="2">Sering</option>
                        <option value="3">Jarang</option>
                        <option value="4">Tidak Pernah</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa sensitif kulit Anda terhadap produk baru?</p>
                    <select name="answers[normal]" required>
                        <option value="1"></option>
                        <option value="1">Sangat Sensitif</option>
                        <option value="2">Sensitif</option>
                        <option value="3">Cukup Sensitif</option>
                        <option value="4">Tidak Sensitif</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa sering Anda mengalami jerawat?</p>
                    <select name="answers[acne]" required>
                        <option value="1"></option>
                        <option value="1">Tidak Pernah</option>
                        <option value="2">Kadang-kadang</option>
                        <option value="3">Sering</option>
                        <option value="4">Sangat Sering</option>
                    </select>
                </div>
                <div>
                    <p>Seberapa lama jerawat anda menghilang?</p>
                    <select name="answers[acne]" required>
                        <option value="1"></option>
                        <option value="1">kurang dari 2 hari</option>
                        <option value="2">3-4 hari</option>
                        <option value="3">Seminggu</option>
                        <option value="4">Sebulan</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
