<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';


    // edna slika pripaga na nekoj film // slikata ke ni pripaga na samo na eden film 
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}
