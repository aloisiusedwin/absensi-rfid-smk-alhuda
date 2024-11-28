@extends('adminlte::page')

@section('title', 'Manajemen Siswa')

@section('content_header')
<<<<<<< HEAD
    <h1 class="text-center text-gradient-primary fw-bold mb-4">Manajemen Data Siswa</h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Alerts -->
            @if (session('msg'))
                <x-adminlte-alert theme="success" title="Berhasil!" dismissable>
                    {{ session('msg') }}
                </x-adminlte-alert>
            @endif
            @if (session('error'))
                <x-adminlte-alert theme="danger" title="Gagal!" dismissable>
                    {{ session('error') }}
                </x-adminlte-alert>
            @endif

            <!-- Form Tambah Data -->
            <div class="card shadow-lg border-0 mb-4 animated-card">
                <div class="card-header bg-gradient-primary text-white text-center">
                    <h5 class="mb-0">Tambah Data Siswa</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{ route('siswa.add') }}" method="post">
                        @csrf
                        <!-- Input Nama -->
                        <x-adminlte-input name="nama" label="Nama Siswa" placeholder="Masukkan Nama Siswa"
                            label-class="text-dark fw-semibold" class="mb-3" />

                        <!-- Input RFID -->
                        <x-adminlte-input name="rfid" label="RFID" placeholder="Masukkan RFID" type="number"
                            igroup-size="md" label-class="text-dark fw-semibold" class="mb-3">
                            <x-slot name="appendSlot">
                                <div class="input-group-text bg-primary text-white">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <!-- Input NIM -->
                        <x-adminlte-input name="nim" label="NIM" placeholder="Masukkan Nomor Induk Siswa"
                            label-class="text-dark fw-semibold" class="mb-3" />

                        <!-- Submit Button -->
                        <div class="text-center">
                            <x-adminlte-button type="submit" label="Tambah Siswa" theme="success"
                                class="px-4 py-2 rounded-pill shadow-lg" />
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Data Siswa -->
            @php
                $heads = [
                    'RFID',
                    'Nama',
                    ['label' => 'NIM', 'width' => 40],
                    ['label' => 'Aksi', 'no-export' => true, 'width' => 10],
                ];
            @endphp

            <div class="card shadow-lg border-0 animated-card">
                <div class="card-header bg-gradient-secondary text-white text-center">
                    <h5 class="mb-0">Daftar Siswa</h5>
                </div>
                <div class="card-body bg-light">
                    <x-adminlte-datatable id="table1" :heads="$heads" class="table-bordered">
=======
    <h1 class="text-primary fw-bold text-center text-uppercase">Manajemen Siswa</h1>
@stop

@section('content')
    <div class="row">
        {{-- Card Tambah Siswa --}}
        <div class="col-md-6">
            <div class="card shadow border-0 hover-card">
                <div class="card-header text-white bg-gradient-primary">
                    <h5 class="mb-0 text-center text-uppercase">Tambah Siswa</h5>
                </div>
                <div class="card-body">
                    {{-- Alert Success --}}
                    @if (session('msg'))
                        <x-adminlte-alert theme="success" title="Berhasil">
                            {{ session('msg') }}
                        </x-adminlte-alert>
                    @endif

                    {{-- Alert Error --}}
                    @if (session('error'))
                        <x-adminlte-alert theme="danger" title="Gagal">
                            {{ session('error') }}
                        </x-adminlte-alert>
                    @endif

                    {{-- Form Input Siswa --}}
                    <form action="{{ route('siswa.add') }}" method="post">
                        @csrf
                        <x-adminlte-input name="nama" label="Nama Siswa" placeholder="Masukkan nama siswa" label-class="text-primary">
                        </x-adminlte-input>

                        <x-adminlte-input name="rfid" label="RFID" placeholder="Masukkan nomor RFID" type="number" igroup-size="sm" label-class="text-primary">
                            <x-slot name="appendSlot">
                                <div class="input-group-text text-white bg-gradient-primary">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-input name="nim" label="NIM" placeholder="Masukkan NIM" label-class="text-primary">
                        </x-adminlte-input>

                        <x-adminlte-button type="submit" label="Tambah Siswa" theme="primary" class="btn-block mt-3 btn-gradient" />
                    </form>
                </div>
            </div>
        </div>

        {{-- Card Tabel Daftar Siswa --}}
        <div class="col-md-6">
            <div class="card shadow border-0 hover-card">
                <div class="card-header text-white bg-gradient-secondary">
                    <h5 class="mb-0 text-center text-uppercase">Daftar Siswa</h5>
                </div>
                <div class="card-body">
                    {{-- Tabel Data Siswa --}}
                    @php
                        $heads = [
                            'RFID',
                            'Nama',
                            'NIM',
                            'Aksi',
                        ];
                    @endphp

                    <x-adminlte-datatable id="table1" :heads="$heads" class="shadow-sm rounded-lg">
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
                        @foreach ($siswas as $item)
                            <tr>
                                <td>{{ $item->rfid }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>
<<<<<<< HEAD
                                    <a href="{{ URL::signedRoute('siswa.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary shadow">
                                        <i class="fas fa-edit me-1"></i>Edit
=======
                                    <a href="{{ URL::signedRoute('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm shadow">
                                        <i class="fas fa-edit"></i> Edit
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
<<<<<<< HEAD
        body {
            background: linear-gradient(135deg, #f9f9f9, #e3f2fd); /* Abu-abu terang ke biru muda */
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 12px;
            border: 1px solid #ddd; /* Outline yang simple */
            box-shadow: none; /* Menghilangkan shadow */
            transition: all 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-3px); /* Animasi hover ringan */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Shadow ringan saat hover */
        }

        .card-header {
            font-size: 1.3rem;
            font-weight: bold;
            border-bottom: 1px solid #ddd; /* Simple border */
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #ccc; /* Outline simple */
            box-shadow: none; /* Tidak ada shadow */
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.4); /* Highlight fokus yang ringan */
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            transition: all 0.2s ease-in-out;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        table.dataTable {
            border: 1px solid #ddd; /* Outline simple */
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
        }

        .bg-gradient-secondary {
            background: linear-gradient(135deg, #6c757d, #495057);
        }

        h1.text-gradient-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
=======
        /* Import Google Font Montserrat */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        /* Global Font Styling */
        body, html {
            font-family: 'Montserrat', sans-serif;
        }

        /* Custom Gradient Colors */
        .bg-gradient-primary {
            background: linear-gradient(to right, #007bff, #0056b3);
        }

        .bg-gradient-secondary {
            background: linear-gradient(to right, #6c757d, #495057);
        }

        /* Button Styling */
        .btn-gradient {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #0056b3, #007bff);
            transform: scale(1.02);
        }

        /* Card Hover Effect */
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        /* Table Header Styling */
        .table th {
            background-color: #f8f9fa;
            color: #343a40;
            text-transform: uppercase;
            font-size: 0.85rem;
        }

        .table td {
            font-size: 0.9rem;
            vertical-align: middle;
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
        }
    </style>
@stop

<<<<<<< HEAD

=======
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
@section('plugins.Datatables', true)

@section('js')
    <script>
<<<<<<< HEAD
        console.log('Manajemen Siswa page loaded.');
=======
        console.log('Halaman Manajemen Siswa dimuat.');
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
    </script>
@stop
