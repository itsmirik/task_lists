<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use View;
use function redirect;

class AuthController extends Controller
{
    public function show(): Application|Factory|\Illuminate\Contracts\View\View
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
            return Redirect::to(route('home'));
        }

        return Redirect::back()->withErrors([
            'password' => trans('auth.failed')
        ]);
    }
}
