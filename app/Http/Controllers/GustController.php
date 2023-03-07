<?php

namespace App\Http\Controllers;

use App\Models\Card;

use Illuminate\Http\Request;

class GustController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $card = Card::find($id);
        return view('card.show',compact('card'));
    }
}
