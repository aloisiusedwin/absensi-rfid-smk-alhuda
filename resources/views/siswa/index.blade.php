<!DOCTYPE html>
<html lang="en">

<head>
    <title>Absensi SMK Al-Huda</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/4c4e4140eb.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        /* Styling untuk memastikan footer berada di bawah */
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .content {
            flex: 1;
        }

        footer {
            background: linear-gradient(135deg, #1a73e8, #1454b4);
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="Logo SMK Al-Huda" class="me-3" width="80" height="50">
                <span class="fw-bold">SMK Al-Huda</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#"><i class="fa fa-home me-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fa fa-archive me-2"></i>Rekap</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    @if ($jadwal != null)
                    <h1 class="mb-4 text-primary">Jadwal Saat Ini</h1>
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <h5 class="card-title text-success fw-bold">{{$jadwal->makul}}</h5>
                            <p class="card-text mt-3">Jam mulai: <span class="badge bg-success">{{$jadwal->jam_mulai}}</span></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="rfid" class="form-label fw-bold">Masukkan RFID Anda:</label>
                        <input type="text" name="rfid" id="rfid" class="form-control text-center" placeholder="Scan RFID Anda" autofocus>
                        <button class="btn btn-primary mt-3">Submit</button>
                    </div>
                    @else
                    <div class="alert alert-danger mt-4" role="alert">
                        <h4 class="alert-heading">Tidak Ada Jadwal</h4>
                        <p class="mt-2">Tidak ada jadwal pada pukul {{$waktuSekarang}}. Silakan kembali lagi nanti.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© 2024 SMK Al-Huda | All Rights Reserved</p>
        </div>
    </footer>

    @vite('resources/js/homepage.js')

</body>

</html>
