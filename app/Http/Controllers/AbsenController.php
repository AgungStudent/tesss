<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absen.absen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'pegawai') {
            return redirect()->back()->with("error", "Ini bukan pegawai");
        }

        $hourNow = now()->hour;
        if ($hourNow > 8) {
            return redirect()->back()->with("error", "sudah melewati batas absen");
        }

        $getNow = Absen::with('user')->where('user_id', auth()->id())->whereDay('created_at', now())->first();
        if ($getNow != null) {
            return redirect()->back()->with("error", "anda sudah absen hari ini");
        }

        Absen::create([
            'status' => $request->role,
            'user_id' => auth()->id()
        ]);

        return redirect()->back()->with("success", auth()->user()->name . " berhasil absen");
    }
}
