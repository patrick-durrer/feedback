<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'answer',
    	'comment',
    	'question_id',
    	'client_id',
    ];
    
    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
