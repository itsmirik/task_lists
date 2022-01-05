<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function route;
use function trans;
use function view;

class AuthController extends Controller
{
    public function show(): Factory|View|Application
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email'    => 'required|exists:users',
            'password' => 'required',
        ]);

        if (Auth::attempt($data, true)) {
            return Redirect::to(route('dashboard'));
        }

        return Redirect::back()->withErrors([
            'password' => trans('auth.failed')
        ]);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return Redirect::to(route('auth.login-page'));
    }
}
