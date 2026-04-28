<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = session('anggota', []);
        return view('anggota.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        $anggota = session('anggota', []);

        $anggota[] = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ];

        session(['anggota' => $anggota]);

        return redirect('/anggota')->with('success', 'Pendaftaran berhasil!');
    }
}