<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies'; // za da se znae za koja tabela tocno se raboti

    // relation for Ratings model // filmot pripaga na nekoj rating 
    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id', 'id');
    }

    // relation for Type model, // filmot pripaga na nekoj tip 
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    // filmot moze da ima poveke sliki 
    public function images()
    {
        return $this->hasMany(Image::class, 'movie_id', 'id');
    }


    // pivot tabela e Many to many vrska 
    // vo eden film ima mnogu akteri, no eden akter igra po poveke filmovi 
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'actors_movies');
    }

    // pivot table
    // sto e pivot table sekogas e belongToMany ako e M M vrska 
    public function directors()
    {
        return $this->belongsToMany(Director::class, 'directors_movies');
    }

    // pivot table 
    // eden movie moze da ima poveke zanrovi 

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genres_movies');
    }
}



