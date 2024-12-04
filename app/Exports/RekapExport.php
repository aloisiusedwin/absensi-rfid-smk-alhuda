<?php

namespace App\Exports;

use App\Models\Rekap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Facades\Excel;

class RekapExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Ambil data rekap dengan join untuk mendapatkan nama siswa, NIS, mapel, dan waktu absen
        return Rekap::join('siswas', 'rekaps.siswa_id', '=', 'siswas.id')
                    ->join('jadwals', 'rekaps.jadwal_id', '=', 'jadwals.id')
                    ->select(
                        'siswas.nama',         // Nama Siswa
                        'siswas.nis',          // NIS
                        'jadwals.mapel',       // Mata Pelajaran
                        'rekaps.created_at as waktu_absen' // Waktu Absen
                    )
                    ->get();
    }

    /**
     * Menambahkan Heading pada file Excel
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Nama Siswa',      // Header untuk Nama Siswa
            'NIS',             // Header untuk NIS
            'Mata Pelajaran',  // Header untuk Mata Pelajaran
            'Waktu Absen',     // Header untuk Waktu Absen
        ];
    }

    /**
     * Menambahkan styling pada file Excel
     */
    public function styles($sheet)
    {
        // Menambahkan style pada header
        $sheet->getStyle('A1:D1')->getFont()->setBold(true); // Membuat font header menjadi bold
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center'); // Menyelaraskan teks ke tengah
        $sheet->getStyle('A1:D1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFFF00'); // Background header kuning

        // Menambahkan border pada seluruh tabel
        $sheet->getStyle('A1:D' . $sheet->getHighestRow())
              ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }

    /**
     * Menambahkan format waktu pada kolom Waktu Absen
     */
    public function columnFormats(): array
    {
        return [
            'D' => 'yyyy-mm-dd hh:mm:ss', // Format untuk Waktu Absen
        ];
    }

    /**
     * Menambahkan ukuran kolom otomatis
     */
    public function autoSize()
    {
        return true;
    }
}





