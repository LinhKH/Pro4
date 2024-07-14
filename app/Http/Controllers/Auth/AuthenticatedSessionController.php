<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Exception;

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
        try {
            Auth::guard('web')->logout();
            $request->session()->regenerateToken();

            $request->authenticate();

            $request->session()->regenerate();

            if($request->user()->status === 'inactive'){
                Auth::guard('web')->logout();
                $request->session()->regenerateToken();
                toastr('account has been banned from website please connect with support!', 'error', 'Account Banned!');
                return redirect('/');
            }

            if($request->user()->role === 'admin'){
                return redirect()->intended('/admin/dashboard');
            }elseif($request->user()->role === 'vendor'){
                return redirect()->intended('/vendor/dashboard');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage(), [__CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine()]);
            // Log::write('ERROR', $e->getMessage(), [__CLASS__ . ':' . __FUNCTION__ . ':' . $e->getLine()]);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
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
