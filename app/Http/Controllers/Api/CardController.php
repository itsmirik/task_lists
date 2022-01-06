<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Desk;
use Illuminate\Http\Request;
use LaravelIdea\Helper\App\Models\_IH_Card_C;
use function auth;

class CardController extends Controller
{
    /**
     * @param Desk $desk
     * @return Card[]|_IH_Card_C
     */
    public function index(Desk $desk)
    {
        return Card::whereDeskId($desk->id)->latest()->get();
    }

    public function store(Request $request): Card
    {
        return Card::create($request->validate([
            'title'   => 'required|string',
            'desk_id' => 'required|int'
        ]));
    }

    /**
     * @param Desk $desk
     * @param Card $card
     * @return _IH_Card_C|Card[]
     */
    public function show(Desk $desk, Card $card)
    {
        return auth()->user()->desks()->whereId($desk->id)->first()->cards()->whereId($card->id)->get();
    }
}
