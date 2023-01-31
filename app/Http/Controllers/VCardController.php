<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;

class VCardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $card = Card::findOrFail($request->card_id);

        // define vcard
        $vcard = new VCard();

        // define variables
        $lastname = $card->famly_name;
        $firstname = $card->name;
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addCompany($card->socite);
        $vcard->addJobtitle($card->poste);
        // $vcard->addRole('Data Protection Officer');
        $vcard->addEmail($card->email);
        $vcard->addPhoneNumber($card->phone, 'PREF;WORK');
        $vcard->addPhoneNumber($card->fix, 'WORK');
        // $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        // $vcard->addLabel('street, worktown, workpostcode Belgium');
        $vcard->addURL($card->website);

        // $vcard->addPhoto(__DIR__ . '/landscape.jpeg');
        // $vcard->addPhoto(url('storage/'.$card->logo));

        // return vcard as a download
        return $vcard->download();
        
        // return vcard as a string
        //return $vcard->getOutput();

        // save vcard on disk
        //$vcard->setSavePath('/path/to/directory');
        //$vcard->save();
    }
}
