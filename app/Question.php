<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
    	'type',
    	'text',
    	'topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function answer()
    {
        return $this->hasMany('App\Answer');
    }
}