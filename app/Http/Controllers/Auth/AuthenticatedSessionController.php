<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

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
    public function store(LoginRequest $request): RedirectResponse|JsonResponse
    {
        // Coba autentikasi menggunakan username & password
        if (Auth::attempt($request->only('username', 'password'))) {
            // Jika autentikasi berhasil, regenerasi session
            $request->session()->regenerate();
            
            // Jika request AJAX, return JSON success
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login berhasil',
                    'redirect' => route('dashboard')
                ], 200);
            }
            
            return redirect()->intended(route('dashboard'));
        }

        // Jika login gagal
        // Cek apakah request dari AJAX
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'error' => 'Username atau password salah. Silakan coba lagi.'
            ], 422);
        }

        // Fallback untuk non-AJAX request
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
