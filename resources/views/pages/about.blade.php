<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Halaman About</title>
</head>

<body>
    <!-- NAVBAR (Langsung dibuat sejajar tanpa tombol hamburger) -->
    <nav class="navbar navbar-dark bg-dark px-4 py-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a class="navbar-brand fs-6 mb-0" href="#">Belajar Laravel 12</a>
            <div class="d-flex gap-4">
                <a class="text-white text-decoration-none small" href="/">Beranda</a>
                <a class="text-white text-decoration-none small" href="/about">Tentang Kami</a>
                <a class="text-white text-decoration-none small" href="/contact">Contact</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <div class="container mt-4">
        <h1 class="fw-normal mb-3" style="font-size: 2rem;">Selamat Datang di Halaman About</h1>

        <!-- Box Border Tipis Persis Gambar 2 -->
        <div class="p-2 border bg-white" style="font-size: 15px; color: #444;">
            Selamat datang {{ $nama }}, dari kelas {{ $kelas }} dengan nim {{ $nim }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>