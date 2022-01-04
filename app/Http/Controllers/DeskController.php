<?php

namespace App\Http\Controllers;

use App\Models\Desk;
use Illuminate\Http\Request;

class DeskController extends Controller
{
    public function index()
    {
        return Desk::latest()->get();
    }

    public function store(Request $request)
    {
        return Desk::create($request->validate([
            'title' => 'required|string'
        ]));
    }
}
