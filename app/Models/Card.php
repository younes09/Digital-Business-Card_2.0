<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory, Searchable;

    protected $guarded = ['id'];

    public function toSearchableArray()
    {
        // $array = $this->toArray();
 
        // Customize the data array...
        return [
            'id' => $this->id,
            'famly_name' => $this->famly_name,
            'phone' => $this->phone, 
            'email' => $this->email,            
        ];
 
        // return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
