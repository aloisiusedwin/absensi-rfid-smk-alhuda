<?php

namespace App\Services;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use App\Repository\JadwalRepository;

class JadwalService
{
    protected JadwalRepository $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepository)
    {
        $this->jadwalRepository = $jadwalRepository;
    }

    public function getAll($userId)
    {
        return $this->jadwalRepository->getAllForUser($userId);
    }

    public function addJadwal($attr)
    {
        return $this->jadwalRepository->insert($attr);
    }

    public function getAllJadwalForUser($userId)
    {
        return $this->jadwalRepository->getAllForUser($userId);
    }

    public function checkRfidForUser($rfid, $userId)
    {
        return Siswa::where('rfid', $rfid)
                    ->where('user_id', $userId)
                    ->first();
    }

    public function getJadwalForDayAndTime($userId, $hariSekarang, $waktuSekarang)
    {
        return $this->jadwalRepository->getJadwalForDayAndTime($userId, $hariSekarang, $waktuSekarang);
    }

    public function findJadwalById($id, $userId)
    {
        return $this->jadwalRepository->getId($id, $userId);
    }

    public function delete($id, $userId)
    {
        return $this->jadwalRepository->delete($id, $userId);
    }

    public function homepage($hari, $waktu)
    {
        $userId = auth()->id(); 
        return $this->jadwalRepository->getTimeByDay($hari, $waktu, $userId);
    }
    
    public function update(array $data)
    {

    $jadwal = $this->jadwalRepository->findJadwalById($data['jadwal_id'], Auth::id());

    if (!$jadwal) {
        return false;  
    }

    $jadwal->mapel = $data['mapel'];
    $jadwal->jam_mulai = $data['jam_mulai'];
    $jadwal->jam_akhir = $data['jam_akhir'];
    $jadwal->hari = $data['hari'];


    return $jadwal->save(); 
    }

}