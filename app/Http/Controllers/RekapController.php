<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\Jadwal;
use App\Services\JadwalService; 
use App\Services\RekapService; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RekapController extends Controller
{

    protected JadwalService $jadwalService;  
    protected RekapService $rekapService;
    /**
     * Display a listing of the resource.
     */

    public function __construct(JadwalService $jadwalService, RekapService $rekapService)
    {
         $this->jadwalService = $jadwalService;   
         $this->rekapService = $rekapService;    
    }

    public function jadwalIndex()
    {
        $jadwals = $this->jadwalService->getAll(Auth::id());
        return view('rekap.jadwal', compact('jadwals'));
    }
    
    
    public function rekapByJadwal($jadwal_id)
    {
        $rekaps = $this->rekapService->getRekapByJadwal($jadwal_id, Auth::id());
        $jadwal = $this->jadwalService->findJadwalById($jadwal_id, Auth::id());
    
        return view('rekap.rekapbyjadwal', compact('rekaps', 'jadwal'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
}
