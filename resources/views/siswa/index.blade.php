@extends('adminlte::page')
@vite ('resources/css/app.css')

@section('title', 'Manajemen Siswa')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header dengan Logo -->
    <div class="header mb-10 text-center">
        <div class="flex flex-col md:flex-row justify-center items-center mb-4">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-blue-600">Manajemen Data Siswa</h1>
                <p class="text-gray-500 text-sm md:text-base">Tambah, edit, atau lihat daftar siswa dengan mudah</p>
            </div>
        </div>
    </div>

    <!-- Form Tambah Siswa -->
    <div class="form-card bg-white shadow-xl rounded-lg p-6 mb-10 border-t-4 border-blue-500">
        <h2 class="text-xl md:text-2xl font-bold text-gray-700 mb-6 text-center">Tambah Data Siswa</h2>
        <form action="{{ route('siswa.add') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Input Nama -->
            <div class="form-group">
                <label for="nama" class="block text-gray-600 font-medium">Nama Siswa</label>
                <div class="relative">
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Siswa" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <!-- Input RFID -->
            <div class="form-group">
                <label for="rfid" class="block text-gray-600 font-medium">RFID</label>
                <div class="relative">
                    <input type="number" name="rfid" id="rfid" placeholder="Masukkan RFID" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-id-card"></i>
                    </span>
                </div>
            </div>

            <!-- Input NIM -->
            <div class="form-group">
                <label for="nim" class="block text-gray-600 font-medium">NIM</label>
                <div class="relative">
                    <input type="text" name="nim" id="nim" placeholder="Masukkan Nomor Induk Siswa" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-key"></i>
                    </span>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="text-center">
                <button type="submit" class="button-primary">
                    Tambah Siswa
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Daftar Siswa -->
    <div class="table-card bg-white shadow-xl rounded-lg p-6 border-t-4 border-blue-500">
        <h2 class="text-xl md:text-2xl font-bold text-gray-700 mb-6">Daftar Siswa</h2>
        <div class="overflow-x-auto">
            <table class="table w-full border-collapse border border-gray-300 text-left text-sm md:text-base">
                <thead class="bg-gradient-to-r from-blue-500 to-teal-400 text-white">
                    <tr>
                        <th class="py-3 px-4">RFID</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">NIM</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($siswas as $item)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="py-3 px-4">{{ $item->rfid }}</td>
                        <td class="py-3 px-4">{{ $item->nama }}</td>
                        <td class="py-3 px-4">{{ $item->nim }}</td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ URL::signedRoute('siswa.edit', $item->id) }}" 
                                class="button-secondary">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-10 bg-gray-100 py-6 text-center text-gray-500 text-sm">
    <p>© 2024 SMK Al-Huda. All Rights Reserved.</p>
</footer>
@stop
