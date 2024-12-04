@extends('adminlte::page')

@section('title', 'Daftar Jadwal')

@section('content_header')
    <h1>Daftar Jadwal</h1>
@stop

@section('content')
    <x-adminlte-datatable id="jadwalTable" :heads="['Mata Pelajaran', 'Hari', 'Jam Mulai', 'Jam Akhir', 'Aksi']">
        @foreach ($jadwals as $jadwal)
            <tr>
                <td>{{ $jadwal->mapel }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->jam_mulai }}</td>
                <td>{{ $jadwal->jam_akhir }}</td>
                <td>
                    <a href="{{ route('rekap.byJadwal', $jadwal->id) }}" class="btn btn-primary btn-sm">
                        Lihat Rekap
                    </a>
                    <a href="{{ url('/rekap/export') }}" class="btn btn-success">Export Rekap ke Excel</a>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>
@stop
