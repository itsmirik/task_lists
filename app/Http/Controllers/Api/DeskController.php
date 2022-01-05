<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Desk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use LaravelIdea\Helper\App\Models\_IH_Desk_C;
use LaravelIdea\Helper\App\Models\_IH_Desk_QB;
use Redirect;

class DeskController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $desks = auth()->user()->desks()->latest()->get();
        return view('dashboard.desks.index', compact('desks'));
    }

    public function store(Request $request): RedirectResponse
    {
        Desk::create($request->validate([
            'title'   => 'required|string',
            'user_id' => 'required|int'
        ]));

        return Redirect::route('desks.index');
    }

    public function create()
    {
        return view('dashboard.desks.create');
    }

    public function show($id): Model|_IH_Desk_C|Collection|_IH_Desk_QB|HasMany|array|Desk|null
    {
        return auth()->user()->desks()->findOrFail($id);
    }
}
