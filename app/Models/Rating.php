<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';


    // R3 moze da se sostoi vo poveke filmovi
    // ratingot ke ima poveke filmovi koi sto se povrzani so nego // primer rating 1 moze da imaat 5 filma rating 2 moze da imaat 3 filma 
    public function movies()
    {
        return $this->hasMany(Movie::class, 'rating_id', 'id');
    }
}
