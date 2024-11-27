@extends('adminlte::page')

@section('title', 'Jadwal')
@vite ('resources/css/app.css')
@section('content_header')
<div class="header mb-8 text-center">
    <h1 class="text-3xl font-bold text-blue-600 bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">
        Manajemen Jadwal
    </h1>
    <p class="text-gray-500 text-sm">Atur dan pantau jadwal dengan mudah</p>
</div>
@stop

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Form Tambah Jadwal -->
    <div class="form-card bg-white shadow-xl rounded-lg p-6 mb-10 border-t-4 border-blue-500 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-xl font-bold text-gray-700 mb-6 text-center bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">
            Tambah Jadwal
        </h2>
        <form action="{{route('jadwal.add')}}" method="post" class="space-y-6">
            @csrf
            <div class="form-group">
                <label for="makul" class="block text-gray-600 font-medium">Nama Mata Kuliah</label>
                <input type="text" name="makul" id="makul" value="{{old('makul')}}" placeholder="Masukkan Nama Mata Kuliah"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div class="form-group">
                <label for="jam_mulai" class="block text-gray-600 font-medium">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" value="{{old('jam_mulai')}}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div class="form-group">
                <label for="jam_akhir" class="block text-gray-600 font-medium">Jam Berakhir</label>
                <input type="time" name="jam_akhir" id="jam_akhir" value="{{old('jam_akhir')}}" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <div class="form-group">
                <label for="hari" class="block text-gray-600 font-medium">Hari</label>
                <select name="hari" id="hari" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-300 focus:outline-none">
                    @foreach ($hari as $item)
                        <option value="{{$item}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="button-primary hover:bg-blue-700">
                    Tambah Jadwal
                </button>
            </div>
        </form>
    </div>

    <!-- Tabel Jadwal -->
    <div class="table-card bg-gray-50 shadow-xl rounded-lg p-6 border-t-4 border-blue-500 hover:shadow-2xl transition-shadow duration-300">
        <h2 class="text-xl font-bold text-gray-700 mb-6 text-center bg-gradient-to-r from-blue-500 to-teal-400 bg-clip-text text-transparent">
            Daftar Jadwal
        </h2>
        <div class="overflow-x-auto">
            @php
            $heads = [
                'Hari',
                'Mata Kuliah',
                'Jam Mulai',
                'Jam Berakhir',
                ['label' => 'Aksi', 'no-export' => true, 'width' => 10],
            ];
            @endphp

            <x-adminlte-datatable id="table1" :heads="$heads" class="table">
                @foreach ($jadwals as $item)
                <tr class="hover:bg-gray-100 transition">
                    <td>{{$item->hari}}</td>
                    <td>{{$item->makul}}</td>
                    <td>{{$item->jam_mulai}}</td>
                    <td>{{$item->jam_akhir}}</td>
                    <td>
                        <a href="{{URL::signedRoute('jadwal.edit', $item->id)}}" 
                            class="button-secondary hover:bg-green-700">
                            Edit
                        </a>
                    </td>
                </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>
</div>
@stop


@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@stop
