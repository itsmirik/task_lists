<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Desk;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Desk $desk, Card $card): View
    {
        $tasks = auth()->user()->desks()->whereId($desk->id)->first()->cards()->whereId($card->id)->first()->tasks;

        return view('dashboard.tasks.index', compact('tasks'));
    }

    public function store(Request $request): RedirectResponse
    {
        Task::create($request->validate([
            'title'       => 'required|string',
            'has_done'    => 'boolean',
            'description' => 'string',
            'card_id'     => 'required|int'
        ]));

        return \Redirect::to('/dashboard/desks');
    }

    public function show(Desk $desk, Card $card, Task $task): Factory|View|Application
    {
        $tasks = auth()->user()->desks()->whereId($desk->id)->first()->cards()->whereId($card->id)->first()->tasks()->whereId($task->id)->get();

        return view('dashboard.tasks.show', compact('tasks'));
    }
}