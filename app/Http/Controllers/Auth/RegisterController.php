<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telp' => ['required', 'numeric'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'no_telp' => $validatedData['no_telp'],
            'alamat' => $validatedData['alamat'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}
