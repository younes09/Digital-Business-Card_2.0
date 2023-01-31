<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Contact::join('cards', 'cards.id', '=', 'contacts.card_id')
        // ->where('contacts.user_id',Auth::user()->id)
        // // ->select('users.*', 'contacts.phone', 'orders.price')
        // ->get();

        $search = trim($request->get('search', ''));
        // $cards = Card::search($search)->paginate(10);   // ->latest()// ->withQueryString();

        if($search != ''){            
            $contactCards = Contact::where('contacts.user_id',Auth::user()->id)
            ->join('cards','contacts.card_id','cards.id')
            ->where('cards.name','LIKE','%'.$search.'%')
            ->orWhere('cards.famly_name','LIKE','%'.$search.'%')
            ->orWhere('cards.email','LIKE','%'.$search.'%')
            ->orWhere('cards.phone','LIKE','%'.$search.'%')
            ->paginate(15);
            return view('contact.index', compact('contactCards','search'));
        }else{
            $contactCards = Contact::where('contacts.user_id',Auth::user()->id)
            ->join('cards','contacts.card_id','cards.id')
            ->paginate(15);
            return view('contact.index', compact('contactCards','search'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alreadyContact = Contact::where('user_id',Auth::user()->id)->where('card_id',$request->card_id)->get();
        $isMyCard = Card::find($request->card_id)->user_id == Auth::user()->id;

        // test if contact alrady inserted
        if(count($alreadyContact) == 0){  
            // test if its not my own card
            if($isMyCard){
                return redirect()->route('cards.show',$request->card_id)
                            ->with('error','It\'s your Card !');
            }else{ 
                // else add to contact liste               
                Contact::create([
                    'user_id' => Auth::user()->id,
                    'card_id' => $request->card_id
                ]);
                return redirect()->route('contacts.index')
                                ->with('success','Contacts inserted successfully');
            }          
        }else {
            return redirect()->route('contacts.index')
                            ->with('error','Contacts already inserted !');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($card_id)
    {
        Contact::where('user_id',Auth::user()->id)->where('card_id',$card_id)->delete();
        
        return redirect()->route('contacts.index')
                        ->with('success','Contacts deleted successfully');
    }
}
