<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // pivot table 
    // eden zanr moze da se sostoi vo poveke filmovi 
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
