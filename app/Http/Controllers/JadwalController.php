<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalPostRequest;
use App\Http\Requests\UpdateJadwalRequest;
use App\Models\Jadwal;
use App\Services\JadwalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JadwalController extends Controller
{
    protected const HARI = [
        "senin","selasa","rabu","kamis","jumat","sabtu"
    ];

    protected JadwalService $jadwalService;

    public function __construct(JadwalService $jadwalService)
    {
        $this->jadwalService = $jadwalService;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari = JadwalController::HARI;
        $jadwals = $this->jadwalService->getAll(Auth::id());
    
        return view("jadwal.index", compact("hari", "jadwals"));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only(['mapel', 'hari', 'jam_mulai', 'jam_akhir']);
        $data['user_id'] = Auth::id(); 

        $this->jadwalService->addJadwal($data);

        return redirect()->route("jadwal")->with("msg", "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = $this->jadwalService->findJadwalById($id, Auth::id());
    
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
    
        return view('jadwal.edit', compact('jadwal', 'hari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $updateJadwalRequest)
    {
        $attr = $updateJadwalRequest->validated();
    
        $updated = $this->jadwalService->update($attr);
    
        if ($updated) {
            return redirect()->route("jadwal.index")->with("msg", "Jadwal berhasil dirubah");
        }
    
        return redirect()->route("jadwal.index")->with("error", "Jadwal gagal dirubah");
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deleted = $this->jadwalService->delete($id, Auth::id());
    
        if ($deleted) {
            return redirect()->route("jadwal")->with("msg", "Jadwal berhasil dihapus");
        }
    
        return redirect()->route("jadwal")->with("error", "Gagal menghapus jadwal");
    }
    
    public function getJadwal()
    {
        $jadwal = $this->jadwalService->getAllJadwalForUser(Auth::id());

        return response()->json($jadwal);
    }
}
