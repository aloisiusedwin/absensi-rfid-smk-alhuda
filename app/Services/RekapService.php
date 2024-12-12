<?php

namespace App\Services;
use App\Models\Rekap;
use App\Repository\RekapRepository;

class RekapService
{
    protected RekapRepository $rekapRepo;

    public function __construct(RekapRepository $rekapRepository)
    {
        $this->rekapRepo = $rekapRepository;
    }

    public function absen($siswa, $jadwal, $userId)  
    {
        Rekap::create([
            'siswa_id' => $siswa->id,
            'user_id' => $userId,
            'jadwal_id' => $jadwal->id,
            'absen_waktu' => now(),
        ]);
    }
    
    public function getRekapByJadwal($jadwal_id, $userId)
    {
        return $this->rekapRepo->getAllByJadwal($jadwal_id, $userId);
    }
    
}