@extends('adminlte::page')

@section('title', 'Edit Jadwal')

@section('content_header')
<div class="text-center mb-6">
    <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">
        Edit Jadwal
    </h1>
    <p class="text-gray-500 text-sm">Perbarui informasi jadwal dengan mudah</p>
</div>
@stop

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="form-card bg-white shadow-xl rounded-lg p-6 border-t-4 border-blue-500 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-xl font-bold text-gray-700 mb-6 text-center bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">
            Form Edit Jadwal
        </h2>
        @if (session('msg'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4 shadow-md">
            {{ session('msg') }}
        </div>
        @endif
        @if (session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4 shadow-md">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('jadwal.update') }}" method="post" class="space-y-6">
            @csrf
            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">

            <!-- Input Mata Kuliah -->
            <div class="form-group">
                <label for="makul" class="block text-gray-600 font-medium">Nama Mata Kuliah</label>
                <input type="text" name="makul" id="makul" value="{{ old('makul', $jadwal->makul) }}" placeholder="Masukkan Nama Mata Kuliah"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <!-- Input Jam Mulai -->
            <div class="form-group">
                <label for="jam_mulai" class="block text-gray-600 font-medium">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <!-- Input Jam Berakhir -->
            <div class="form-group">
                <label for="jam_akhir" class="block text-gray-600 font-medium">Jam Berakhir</label>
                <input type="time" name="jam_akhir" id="jam_akhir" value="{{ old('jam_akhir', $jadwal->jam_akhir) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <!-- Input Hari -->
            <div class="form-group">
                <label for="hari" class="block text-gray-600 font-medium">Hari</label>
                <select name="hari" id="hari" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    @foreach ($hari as $item)
                        <option value="{{ $item }}" @if ($jadwal->hari == $item) selected @endif>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="button-primary hover:bg-blue-700">
                    Edit Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
@stop

@section('js')
<script>
    // Inisialisasi Select2 jika diperlukan
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });
</script>
@stop
