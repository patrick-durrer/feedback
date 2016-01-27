<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Question;

class AnswerRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $questions = Question::where('required', 1)->pluck('type', 'id')->all();
        //                |->Lade Model Question
        //                        |->Hole alle Einträge und lade Sie in eine Collection
        //                                 |->Ordne die Daten anhand der ID und füge den Wert "type" hinzu.
        //                                                     |-> Gib das ganze als Array zurück
        
        var_dump($questions);

        foreach($questions as $id => $type)
        {
            $typeText = ($type === 0 ? 'radio_question' : 'text_question');
            $rules[$typeText.'.'.$id] = 'required';
        }

        return $rules;
    }
}