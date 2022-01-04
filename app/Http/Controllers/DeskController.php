<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use Illuminate\Http\Request;
use LaravelIdea\Helper\App\Models\_IH_Desk_C;

class DeskController extends Controller
{
    /**
     * @return _IH_Desk_C|Desk[]
     */
    public function index()
    {
        return Desk::latest()->get();
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
