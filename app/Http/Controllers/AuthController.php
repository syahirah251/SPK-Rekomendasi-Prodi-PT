<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Halaman Login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        // Ambil data user berdasarkan email
        $user = User::where('email', $request->email)->first();
        
        // Menggunakan trim() untuk menghapus spasi di awal dan akhir password
        $password = trim($request->password);
    
        // Cek apakah user ditemukan dan password yang dimasukkan cocok dengan hash di database
        if ($user && Hash::check($password, $user->password)) {
            // Lakukan login jika password cocok
            Auth::login($user);
            $request->session()->regenerate(); // Regenerate session untuk menghindari session fixation
            return redirect()->intended('/home')->with('success', 'Login berhasil!');
        }
    
        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah!'])->withInput();
    }
    
    public function logout(Request $request)
    {
        Auth::logout();

        // Hapus sesi untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout.');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses Registrasi
    // Pastikan password yang disimpan sudah di-hash menggunakan bcrypt
public function register(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6', // Password tidak boleh kosong
    ]);

    // Hash password menggunakan bcrypt
    $hashedPassword = trim($request->password);

    // Buat pengguna baru dengan password yang sudah di-hash
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $hashedPassword,
    ]);

    // Opsi: Login otomatis setelah registrasi
    auth()->login($user);

    return redirect('/home')->with('success', 'Registrasi berhasil! Anda telah login.');
}
    
}
