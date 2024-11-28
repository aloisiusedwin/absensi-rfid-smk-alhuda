<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manajemen Jadwal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/4c4e4140eb.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #e0f7fa, #f0f9ff);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .navbar {
            background: linear-gradient(to right, #1e40af, #14b8a6);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .navbar-brand img {
            border-radius: 50%;
            height: 40px;
        }

        .navbar-brand,
        .nav-link {
            color: white !important;
            font-weight: bold;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: translateY(10px);
            animation: slideUp 0.8s ease-out;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .badge {
            font-size: 1rem;
            animation: fadeIn 1.2s ease-in-out;
        }

        footer {
            background: linear-gradient(to right, #1e40af, #14b8a6);
            color: white;
            padding: 15px 0;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
        }

        footer p {
            margin: 0;
            font-size: 0.85rem;
        }

        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem;
            }

            .navbar-brand img {
                height: 30px;
            }

            .card {
                max-width: 100%;
                margin: 0 auto;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert {
            animation: fadeIn 1.2s ease-in-out;
        }

        .form-control {
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo">
                <span class="ms-2">SMK Al-Huda</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="jadwal"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-archive"></i> Rekap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container text-center py-4">
            <h1 class="text-primary fw-bold">Manajemen Jadwal</h1>
            <p class="text-muted">Pantau jadwal dan input data dengan mudah.</p>

            <div class="mt-5">
                @if ($jadwal != null)
                <!-- Jadwal Aktif -->
                <div class="card mx-auto text-center p-4" style="max-width: 22rem;">
                    <h3 class="text-success">{{$jadwal->makul}}</h3>
                    <p class="text-muted mb-2">Jam Mulai:</p>
                    <span class="badge bg-success py-2 px-3">{{$jadwal->jam_mulai}}</span>
                    <div class="mt-4">
                        <label for="rfid" class="form-label text-primary">RFID</label>
                        <input type="text" id="rfid" name="rfid" class="form-control" placeholder="Masukkan RFID" autofocus>
                    </div>
                </div>
                @else
                <!-- Tidak Ada Jadwal -->
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Tidak Ada Jadwal</h4>
                    <p>Jadwal kosong pada jam <strong>{{$waktuSekarang}}</strong>. Silakan kembali lagi.</p>
                </div>
                @endif
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>© 2024 SMK Al-Huda. All Rights Reserved.</p>
    </footer>
</body>
</html>
