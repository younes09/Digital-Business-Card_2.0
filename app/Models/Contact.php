<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    public function toSearchableArray()
    {
        // $array = $this->toArray();
 
        // Customize the data array...
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'card_id' => $this->card_id,          
        ];
        // return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
