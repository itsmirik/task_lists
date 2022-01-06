<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Desk;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * @param Desk $desk
     * @return Application|Factory|View
     */
    public function index(Desk $desk): View|Factory|Application
    {
        $cards = auth()->user()->desks()->whereId($desk->id)->first()->cards()->get();

        return view('dashboard.card.index', compact('cards'));
    }

    public function store(Desk $desk, Card $card, Request $request): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->desks()->whereId($desk->id)->first()->cards()->create($request->validate([
            'title'   => 'required|string',
            'desk_id' => 'required|int'
        ]));

        return \Redirect::route('desks.cards.index', $desk->id);
    }

    /**
     * @param Desk $desk
     * @param Card $card
     * @return Application|Factory|View
     */
    public function show(Desk $desk, Card $card): View|Factory|Application
    {
        $cards = auth()->user()->desks()->whereId($desk->id)->first()->cards()->whereId($card->id)->get();

        return view('dashboard.card.show', compact('cards'));
    }
}
