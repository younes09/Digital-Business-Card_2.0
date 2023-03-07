<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        $cards = Card::search($search)->paginate(10);   // ->latest()// ->withQueryString();
        $user = User::find(Auth::user()->id);
        return view('card.index', compact('user','cards','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);

        if($user->plan == "free"){
            if(count($user->cards) >= 2){
                return back()->with('free','You are free user, you are limited to create only 2 cards, you want more folow the link');
            }
        }
        return view('card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Get all the inputs in to an array
        $input = $request->all();

        // liste of images inputs
        $photos = array('photo','logo');

        foreach ($photos as $photo) {
            // test if user has upload an image
            if($request->hasFile($photo)){
                // change request ipute value
                $input[$photo] = $request->file($photo)->store($photo,'save');
            }else{
                // remove images from the request
                unset($input[$photo]);
            }
        }

        // Set the user id to the card
        $input['user_id'] = Auth::user()->id;
        // add data to database
        Card::create($input);
       
        return redirect()->route('cards.index')
                        ->with('success','Carte créée avec succès.');
        // return url('storage/'.$input['photo']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('card.show',compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('card.edit',compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        // Get all the inputs in to an array
        $input = $request->all();

        // liste of images inputs
        $photos = array('photo','logo');
        foreach ($photos as $photo) {
            // test if user has upload an image
            if($request->hasFile($photo)){
                // if file existe && DB data != null the dele old file 
                if(file_exists(public_path('storage/'.$card->$photo)) && $card->$photo != null){
                    unlink(public_path('storage/'.$card->$photo));
                }
                // change request ipute value
                $input[$photo] = $request->file($photo)->store($photo,'public');
            }else{
                // remove images from the request
                unset($input[$photo]);
            }
        }

        // excute the update
        $card->update($input);
      
        return redirect()->route('cards.index')
                        ->with('success','Carte mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        // Delet all user photos if they exists
        $photos = array('photo','logo');
        foreach ($photos as $photo) {
            if(file_exists(public_path('storage/'.$card->$photo)) && $card->$photo != null){
                unlink(public_path('storage/'.$card->$photo));
            }
        }

        $card->delete();
     
        return redirect()->route('cards.index')
                        ->with('success','Carte supprimée avec succès.');
    }
}
