@extends('adminlte::page')

@section('title', 'Manajemen Siswa')

@section('content_header')
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
                        @foreach ($siswas as $item)
                            <tr>
                                <td>{{ $item->rfid }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>
                                    <a href="{{ URL::signedRoute('siswa.edit', $item->id) }}" class="btn btn-primary btn-sm shadow">
                                        <i class="fas fa-edit"></i> Edit
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
        }
    </style>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        console.log('Halaman Manajemen Siswa dimuat.');
    </script>
@stop
