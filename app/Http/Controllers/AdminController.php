<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        return view('admin.menuadmin', compact('users'));
    }

    public function rekapData()
    {
        return view('admin.rekapdata');
    }

    public function insertPegawai(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'password' => ['required', 'string', 'min:8',],
        ]);

        User::create($validated + ['role' => 'pegawai']);
        return redirect()->back()->with('success', "berhasil menambah pegawai baru");
    }
}
