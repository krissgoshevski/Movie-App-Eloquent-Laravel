<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'types';


    // type ima mnogu filmovi // eden tip moze da pripaga na poveke filmovi 
    public function movies()
    {
        return $this->hasMany(Movie::class, 'type_id', 'id');
    }
}
