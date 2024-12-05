<?php

namespace App\Repository;

use App\Models\Rekap;

class RekapRepository
{
    protected Rekap $rekap;

    public function __construct(Rekap $rekap)
    {
        $this->rekap = $rekap;
    }

    public function insert($siswa_id, $jadwal_id)
    {
        return $this->rekap->create([
            "jadwal_id" => $jadwal_id,
            "siswa_id" => $siswa_id,
            "user_id" => auth()->id(),
        ]);
    }
    

    public function getRekapBySiswaAndJadwal($siswa_id, $jadwal_id)
    {
        return Rekap::where('siswa_id', $siswa_id)
                    ->where('jadwal_id', $jadwal_id)
                    ->first();
    }

    public function getAllByJadwal($jadwal_id, $userId)
    {
        return Rekap::where('jadwal_id', $jadwal_id)
                    ->whereHas('jadwal', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })
                    ->get();
    }


}