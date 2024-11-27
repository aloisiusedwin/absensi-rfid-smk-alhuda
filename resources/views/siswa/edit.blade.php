@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
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
@stop
