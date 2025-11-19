<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman form login.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Menangani upaya autentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'string', 'size:16'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin' || $user->role === 'petugas') {
                return redirect()->intended('/admin/dashboard');
            }

            return redirect()->intended('/laporan-saya');
        }

        return back()->withErrors([
            'email' => 'Email atau Password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
