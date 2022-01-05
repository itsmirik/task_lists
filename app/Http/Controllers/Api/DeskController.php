<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $desks = Desk::latest()->get();
        return view('dashboard.desks', compact('desks'));
    }

    /**
     * @param Request $request
     * @return Desk
     */
    public function store(Request $request): Desk
    {
        return Desk::create($request->validate([
            'title'   => 'required|string',
            'user_id' => 'required|int'
        ]));
    }

    public function show(int $id)
    {
        return Desk::findOrFail($id);
    }
}
