<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Desk;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Redirect;

class CardController extends Controller
{
    /**
     * @param Desk $desk
     * @return View
     * @throws AuthorizationException
     */
    public function index(Desk $desk): View
    {
        $this->authorize('edit', $desk);

        return view('dashboard.card.index', [
            'cards' => $desk->cards,
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function store(Desk $desk, Card $card, Request $request): RedirectResponse
    {
        $this->authorize('edit', [$desk, $card]);

        $desk->cards()->create($request->validate([
            'title' => 'required|string',
        ]));

        return Redirect::route('desks.cards.index', $desk->id);
    }

    /**
     * @param Desk $desk
     * @param Card $card
     * @return View
     * @throws AuthorizationException
     */
    public function show(Desk $desk, Card $card): View
    {
        $this->authorize('edit', $card);

        return view('dashboard.card.show', compact('card'));
    }
}
