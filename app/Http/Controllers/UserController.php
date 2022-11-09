<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', 'confirmed', 'min:8',],
            'image' => ['required', 'image'],
            'role' => ['required', 'string']
        ]);

        $validated['image'] = $request->file('image')?->store('user');

        $user = User::create($validated);
        return redirect()->back()->with('success', "berhasil menambah " . $validated['role'] . " baru");
    }

    public function loginPegawai(Request $request)
    {
        $validated = $request->validate([
            'email' => ['email', 'required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (auth()->guard('pegawai')->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect('/home'); // PEGAWAI
        }

        return redirect()->back()->with("error", "email atau password salah");
    }

    public function loginAdmin(Request $request)
    {
        $validated = $request->validate([
            'email' => ['email', 'required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (auth()->attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            return redirect('/menu-admin'); // PEGAWAI
        }

        return redirect()->back()->with("error", "email atau password salah");
    }


    public function logoutAdmin()
    {
        auth()->guard()->logout();
        return redirect()->route('login-admin');
    }
}
