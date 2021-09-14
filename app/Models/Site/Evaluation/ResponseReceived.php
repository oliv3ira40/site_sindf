<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class ResponseReceived extends Model
{
    protected $table = 'responses_received';
    protected $fillable = [
        'completed_evaluation_id',
        'possible_question_answer_id',
        'available_question_id',
        'evaluation_id',
        'text_response',
    ];



    function Evaluation() {
        return $this->belongsTo('App\Models\Site\Evaluation\Evaluation', 'evaluation_id');
    }

    function CompletedEvaluation() {
        return $this->belongsTo('App\Models\Site\Evaluation\CompletedEvaluation', 'completed_evaluation_id');
    }
}