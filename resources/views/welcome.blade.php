<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-custom {
            background: #2c2f33;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-dark text-white">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="image/logo.png" alt="Layanan Pengaduan" width="150" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Form Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Semua Pengaduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Data Statistik</a></li>
                </ul>
                @if (Auth::check())
                    <div class="d-flex align-items-center ms-3">
                        <span class="me-2">👤 {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                @else
                    <a href="/login" class="btn btn-primary ms-3">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Konten -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Semua Pengaduan</h2>
        <div class="card card-custom text-white">
            <div class="card-body text-center">
                <h1>🚧 Dalam Mode Pengembangan 🚧</h1>
                <p>Halaman ini masih dalam tahap pengembangan. Silakan kembali nanti.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
