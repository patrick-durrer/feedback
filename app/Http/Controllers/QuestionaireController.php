<?php

namespace App\Http\Controllers;

use App\Question;
use App\Topic;
use App\Client;
use App\Answer;

use App\Http\Requests;
use App\Http\Requests\AnswerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionaireController extends Controller
{
    public function index()
    {

    	return view('questionaire.index');

    }    

    public function create()
    {
    	$questions = Question::all()->groupBy('topic_id');

        $topics = Topic::all()->pluck('text', 'id')->all();

    	return view('questionaire.create', compact('questions', 'topics'));

    }

    //AnswerRequest überprüft im Moment einfach alle geschickten Variablen, jedoch nicht wenn eine nicht geschickt wurde. Wie kann ich das schlau machen?
    //Was gibt der Wert $request zurück?
    public function store(AnswerRequest $request)
    {

    	$client = Client::create();

    	//Was macht hier das ->all();
    	$questionData = $request->all();
    	
    	foreach($questionData["radio_question"] as $question => $value)
    	{
    		$answer = new Answer;
    		$answer->question_id = $question;
    		$answer->answer = $value;
    		$answer->client_id =  $client->id;
    	
    		//Unterschied zwischen ->save und ::create
    		$answer->save();
    	}

    	//Kann man das irgendwie sauberer lösen als mit dieser foreach Schleife, damit es DRY-Kompatibel ist?
        foreach($questionData["text_question"] as $question => $value)
    	{
    		$answer = new Answer;
    		$answer->question_id = $question;
    		$answer->comment = $value;
    		$answer->client_id =  $client->id;
    	
    		//Unterschied zwischen ->save und ::create
    		$answer->save();
    	}
    
    }
}
