@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div>
            <!-- Sidebar content (misalnya link atau menu) -->
            @include('includes.sidebar')
        </div>
        <div class="col-md-10">
            <div class="home-content text-center mt-3" style="font-size: 1.2em;"> <!-- Menambahkan pengaturan ukuran font -->
                <h1 style="font-size: 2.5em; text-align: center;">Selamat Datang di SPK Rekomendasi Pemilihan Program Studi</h1>
                <p style="margin-top: 20px; font-size: 1.1em; line-height: 1.6; text-align: justify;">
                    Memilih program studi yang tepat adalah langkah penting dalam merencanakan masa depan akademik dan karier Anda. Setiap individu memiliki keunikan dalam minat, bakat, serta potensi yang dapat dikembangkan dengan baik apabila diarahkan ke program studi yang sesuai. Oleh karena itu, aplikasi Sistem Pendukung Keputusan (SPK) ini hadir untuk membantu Anda menavigasi pilihan yang ada berdasarkan preferensi dan kemampuan yang Anda miliki.
                </p>
                <p style="margin-top: 20px; font-size: 1.1em; line-height: 1.6; text-align: justify;">
                    Aplikasi ini dirancang untuk memberikan rekomendasi yang akurat dan relevan dengan menggunakan berbagai kriteria, termasuk minat pribadi, hasil akademik, dan prospek karier di masa depan. Dengan memanfaatkan data yang Anda masukkan, sistem akan melakukan analisis mendalam dan memberikan saran yang dapat mendukung Anda dalam menentukan pilihan program studi yang paling sesuai dengan profil diri Anda. Hal ini bertujuan agar Anda dapat meraih kesuksesan akademik serta kepuasan di bidang yang Anda geluti.
                </p>
                <p style="margin-top: 20px; font-size: 1.1em; line-height: 1.6; text-align: justify;">
                    Kami percaya bahwa dengan panduan yang tepat, setiap individu dapat menemukan jalur pendidikan yang selaras dengan potensi mereka. Rekomendasi yang dihasilkan oleh aplikasi ini diharapkan dapat membantu Anda lebih percaya diri dalam mengambil keputusan yang akan membentuk masa depan Anda. Pilihlah program studi yang sesuai dengan keyakinan dan dukungan yang kuat, demi mewujudkan cita-cita serta ambisi Anda.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
