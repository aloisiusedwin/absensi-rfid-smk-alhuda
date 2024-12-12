@extends('adminlte::page')

@section('title', 'Rekap Siswa - ' . $jadwal->mapel)

@section('content_header')
    <h1>Rekap Siswa - {{ $jadwal->mapel }}</h1>
@stop

@section('content')
    <x-adminlte-datatable id="rekapTable" :heads="['Nama Siswa', 'NIS']">
        @foreach ($rekaps as $rekap)
            <tr>
                <td>{{ $rekap->siswa->nama }}</td>
                <td>{{ $rekap->siswa->nis }}</td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
