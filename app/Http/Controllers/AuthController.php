<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Menampilkan halaman login admin
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.auth.login');
    }

    /**
     * Memproses login admin
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Cek apakah user adalah admin (bisa ditambahkan field is_admin di database)
        $user = User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            // Log failed login attempt
            Log::warning('Failed admin login attempt', [
                'email' => $credentials['email'],
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            throw ValidationException::withMessages([
                'email' => ['Kredensial tidak valid.'],
            ]);
        }

        // Untuk keamanan, kita akan cek apakah user adalah admin
        // Anda bisa menambahkan field is_admin di tabel users atau menggunakan email tertentu
        if (!in_array($user->email, config('app.admin_emails', ['admin@kliniklansia.com']))) {
            Log::warning('Unauthorized admin access attempt', [
                'email' => $credentials['email'],
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            throw ValidationException::withMessages([
                'email' => ['Akses ditolak.'],
            ]);
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Log successful login
            Log::info('Admin login successful', [
                'email' => $user->email,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            
            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Login berhasil!');
        }

        // Log failed login attempt
        Log::warning('Failed admin login attempt - wrong password', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        throw ValidationException::withMessages([
            'email' => ['Kredensial tidak valid.'],
        ]);
    }

    /**
     * Logout admin
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login')
            ->with('success', 'Logout berhasil!');
    }
}
