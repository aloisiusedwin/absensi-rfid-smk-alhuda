<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function jadwalIndex()
    {
        $jadwals = Jadwal::all();
        return view('rekap.jadwal', compact('jadwals'));
    }
    
    public function rekapByJadwal($jadwal_id)
    {
        $rekaps = Rekap::with('siswa')->where('jadwal_id', $jadwal_id)->get();
        $jadwal = Jadwal::findOrFail($jadwal_id);
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
