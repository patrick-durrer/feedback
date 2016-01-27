<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
    	'text',
    ];

    public function topic()
    {
        return $this->hasMany('App\Question');
    }
}
