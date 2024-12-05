<?php

namespace App\Repository;

use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;

class JadwalRepository
{
    protected Jadwal $jadwal;

    public function __construct(Jadwal $jadwal)
    {
        $this->jadwal = $jadwal; 
    }

    public function insert($attr)
    {
        try {
            DB::beginTransaction();
            $jadwal = $this->jadwal->create($attr);
            DB::commit();
            return $jadwal;
        } catch (\Throwable $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function getAllForUser($userId)
    {
        return $this->jadwal->where('user_id', $userId)->get();
    }

    public function getId($id, $userId)
    {
    return $this->jadwal->where('id', $id)->where('user_id', $userId)->first();
    }

    public function findJadwalById($id, $userId)
    {
    return $this->jadwal->where('id', $id)
                        ->where('user_id', $userId)
                        ->first();
    }

    public function getJadwalForDayAndTime($userId, $hariSekarang, $waktuSekarang)
    {
        return $this->jadwal->where('user_id', $userId)
                            ->where('hari', $hariSekarang) 
                            ->where('jam_mulai', '<=', $waktuSekarang) 
                            ->where('jam_akhir', '>=', $waktuSekarang) 
                            ->first(); 
    }
    
    public function getTimeByDay($hari, $waktu, $userId)
    {
        return Jadwal::where('hari', $hari)
                     ->where('jam_mulai', '<=', $waktu)
                     ->where('jam_akhir', '>=', $waktu)
                     ->where('user_id', $userId) // Filter berdasarkan user_id
                     ->first();
    }

    public function update($data)
    {
        $jadwal = $this->jadwal->where('id', $data['jadwal_id'])->where('user_id', $data['user_id'])->first();
        return $jadwal ? $jadwal->update($data) : false;
    }

    public function delete($id, $userId)
    {
        $jadwal = Jadwal::where('id', $id)->where('user_id', $userId)->first();
        if ($jadwal) {
            return $jadwal->delete();
        }
        return false;
    }
    
}

