<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
