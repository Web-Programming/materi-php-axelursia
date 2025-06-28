<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function do_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan level user
            $user = Auth::user();
            switch ($user->level) {
                case 'admin':
                    return redirect()->intended('/admin/dashboard');
                case 'dosen':
                    return redirect()->intended('/dosen/dashboard');
                case 'mahasiswa':
                    return redirect()->intended('/mahasiswa/dashboard');
                default:
                    return redirect()->intended('/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->withInput();
    }

    // Tampilkan form register dengan pilihan level
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register dengan penambahan level
    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'level' => 'required|in:user,mahasiswa,dosen',
        ]);

        if ($validator->fails()) {
            return redirect("register")
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout.');
    }

    // Tampilkan dashboard berdasarkan level
    public function dashboard()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login');
        }

        switch ($user->level) {
            case 'admin':
                return view('dashboard.admin');
            case 'dosen':
                return view('dashboard.dosen');
            case 'mahasiswa':
                return view('dashboard.mahasiswa');
            default:
                return view('dashboard.user');
        }
    }
}
