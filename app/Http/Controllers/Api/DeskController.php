<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;

class DeskController extends Controller
{
    /**
     * show authenticated user desks;
     *
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $desks = auth()->user()->desks()->latest()->get();

        return view('dashboard.desks.index', compact('desks'));
    }

    /**
     * store a desk
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Auth::user()->desks()->create($request->validate([
            'title' => 'required|string',
        ]));

        return Redirect::route('desks.index');
    }

    /**
     * show desk create page
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.desks.create');
    }

    /**
     * Show a $desk
     *
     * @param $id
     * @return Desk
     */
    public function show($id): Desk
    {
        return auth()->user()->desks()->findOrFail($id);
    }
}
