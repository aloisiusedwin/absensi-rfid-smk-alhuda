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
        
        return Rekap::join('siswas', 'rekaps.siswa_id', '=', 'siswas.id')
                    ->join('jadwals', 'rekaps.jadwal_id', '=', 'jadwals.id')
                    ->select(
                        'siswas.nama',         
                        'siswas.nis',         
                        'jadwals.mapel',       
                        'rekaps.created_at as waktu_absen' 
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
            'Nama Siswa',      
            'NIS',             
            'Mata Pelajaran',  
            'Waktu Absen',     
        ];
    }

    /**
     * Menambahkan styling pada file Excel
     */
    public function styles($sheet)
    {
        
        $sheet->getStyle('A1:D1')->getFont()->setBold(true); 
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal('center'); 
        $sheet->getStyle('A1:D1')->getFill()->setFillType('solid')->getStartColor()->setARGB('FFFF00'); 

    
        $sheet->getStyle('A1:D' . $sheet->getHighestRow())
              ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }

    /**
     * Menambahkan format waktu pada kolom Waktu Absen
     */
    public function columnFormats(): array
    {
        return [
            'D' => 'yyyy-mm-dd hh:mm:ss', 
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





