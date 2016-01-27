<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
}
