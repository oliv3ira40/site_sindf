<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class PossibleQuestionAnswer extends Model
{
    protected $table = 'possible_question_answers';
    protected $fillable = [
        'position',
        'response_text', // 300
        'description', // 1000
        'available_question_id',
        'exclusive_condit_resp_id',
    ];



    function AvailableQuestion() {
        return $this->belongsTo('App\Models\Site\Evaluation\AvailableQuestion', 'available_question_id');
    }
    function ResponsesReceived() {
        return $this->hasMany('App\Models\Site\Evaluation\ResponseReceived', 'possible_question_answer_id');
    }
}
