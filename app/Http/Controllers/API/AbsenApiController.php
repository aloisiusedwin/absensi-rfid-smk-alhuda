<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\JadwalService;
use App\Services\RekapService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class AbsenApiController extends Controller
{
    protected $jadwalService;
    protected $rekapService;

    public function __construct(JadwalService $jadwalService, RekapService $rekapService)
    {
        $this->jadwalService = $jadwalService;
        $this->rekapService = $rekapService;
    }

    public function store(Request $request)
    {
        $rfid = $request->rfid;
        $hariSekarang = strtolower(Carbon::now()->isoFormat('dddd', Lang::get('id')));
        $waktuSekarang = Carbon::now()->format('H:i');

        $siswa = $this->jadwalService->checkRfidForUser($rfid, Auth::id());

        if (!$siswa) {
            return response()->json([
                'error' => true,
                'message' => 'Siswa tidak terdaftar dengan RFID ini atau bukan milik Anda.',
            ]);
        }

        $jadwal = $this->jadwalService->homepage($hariSekarang, $waktuSekarang);

        if (!$jadwal) {
            return response()->json([
                'error' => true,
                'message' => 'Jadwal tidak ditemukan atau bukan milik Anda.'
            ]);
        }

        $this->rekapService->absen($siswa, $jadwal, Auth::id());

        return response()->json([
            'error' => false,
            'msg' => 'Absensi berhasil'
        ]);
    }
}



