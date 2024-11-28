@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
<<<<<<< HEAD
    <h1 class="text-primary font-weight-bold text-center animate__animated animate__fadeInDown">Edit Data Siswa</h1>
@stop

@section('content')
<div class="container animate__animated animate__fadeInUp">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-gradient-to-r from-blue-500 to-teal-400 text-white text-center">
            <h4 class="card-title m-0">Form Edit Data Siswa</h4>
        </div>
        <div class="card-body">
            <form action="{{route('siswa.update')}}" method="post" class="space-y-6">
                @csrf
                {{-- Input Nama Siswa --}}
                <div class="mb-4">
                    <x-adminlte-input 
                        name="nama" 
                        label="Nama Siswa" 
                        value="{{$siswa->nama}}" 
                        placeholder="Masukkan Nama"
                        fgroup-class="mb-3 animate__animated animate__zoomIn"
                        label-class="text-primary font-weight-bold">
                    </x-adminlte-input>
                </div>

                {{-- Input RFID (Readonly) --}}
                <div class="mb-4">
                    <x-adminlte-input 
                        name="rfid" 
                        label="RFID" 
                        readonly 
                        placeholder="Masukkan RFID"
                        value="{{$siswa->rfid}}" 
                        fgroup-class="mb-3 animate__animated animate__zoomIn"
                        type="number"
                        label-class="text-primary font-weight-bold">
                        <x-slot name="appendSlot">
                            <div class="input-group-text bg-dark text-white">
                                <i class="fas fa-hashtag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                </div>

                {{-- Input NIM --}}
                <div class="mb-4">
                    <x-adminlte-input 
                        name="nim" 
                        label="NIM" 
                        value="{{$siswa->nim}}" 
                        placeholder="Masukkan NIM"
                        fgroup-class="mb-3 animate__animated animate__zoomIn"
                        label-class="text-primary font-weight-bold">
                    </x-adminlte-input>
                </div>

                {{-- Tombol Submit --}}
                <div class="text-center">
                    <x-adminlte-button 
                        type="submit" 
                        label="Simpan Perubahan" 
                        theme="success" 
                        icon="fas fa-save" 
                        class="btn-lg px-5 shadow-lg hover:scale-110 transform transition duration-300 ease-in-out animate__animated animate__heartBeat"
                    />
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- Tambahkan library animate.css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
<style>
    .card-header {
        font-size: 1.2rem;
        font-weight: bold;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    }
    .btn-lg:hover {
        background-color: #28a745 !important;
        color: white !important;
    }
</style>
@stop

@section('plugins.Datatables', true)
@section('js')
<script>
    console.log("Edit Siswa page loaded!");
</script>
=======
    <h1 class="text-primary fw-bold text-center text-uppercase">Edit Siswa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow-sm border-0 hover-card">
                <div class="card-header text-white bg-gradient-primary">
                    <h5 class="mb-0 text-center text-uppercase">Form Edit Siswa</h5>
                </div>
                <div class="card-body">
                    {{-- Form Edit Siswa --}}
                    <form action="{{ route('siswa.update') }}" method="post">
                        @csrf

                        {{-- Nama Siswa --}}
                        <x-adminlte-input name="nama" label="Nama Siswa" value="{{ $siswa->nama }}" placeholder="Masukkan nama siswa" label-class="text-primary">
                        </x-adminlte-input>

                        {{-- RFID --}}
                        <x-adminlte-input name="rfid" label="RFID" readonly placeholder="RFID" type="number" igroup-size="sm" value="{{ $siswa->rfid }}" label-class="text-primary">
                            <x-slot name="appendSlot">
                                <div class="input-group-text text-white bg-gradient-primary">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        {{-- NIM --}}
                        <x-adminlte-input name="nim" value="{{ $siswa->nim }}" label="NIM" placeholder="Masukkan NIM" label-class="text-primary">
                        </x-adminlte-input>

                        {{-- Submit Button --}}
                        <x-adminlte-button type="submit" label="Simpan Perubahan" theme="primary" class="btn-block mt-3 btn-gradient" />
                    </form>
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
        body {
            font-family: 'Montserrat', sans-serif;
        }

        /* Custom Gradient Colors */
        .bg-gradient-primary {
            background: linear-gradient(to right, #007bff, #0056b3);
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

        /* Form Input Styling */
        .form-control:focus {
            box-shadow: 0 0 10px rgba(37, 99, 235, 0.5);
            transform: scale(1.02);
        }
    </style>
@stop

@section('plugins.Datatables', true)

@section('js')
    <script>
        console.log('Halaman Edit Siswa dimuat.');
    </script>
>>>>>>> d91873e6e894c35cd200fa5f79ff2ef11cc02b6a
@stop
