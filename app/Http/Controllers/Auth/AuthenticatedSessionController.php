<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Coba autentikasi menggunakan username & password
        if (Auth::attempt($request->only('username', 'password'))) {
            // Jika autentikasi berhasil, regenerasi session
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        // Jika login gagal, kirimkan pesan error ke session
    return back()->with('error', 'Username atau password salah. Silakan coba lagi.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
