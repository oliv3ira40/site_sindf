<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class AvailableQuestion extends Model
{
    protected $table = 'available_questions';
    protected $fillable = [
        'position',
        'question_text', // 500
        'description', // 1000
        'title_confirmation_text', // 200
        'confirmation_text', // 10000
        'reading_the_mandatory_confirmation_text',
        'evaluation_id',
        'question_topic_id',
        'question_type_id',
    ];



    function Evaluation() {
        return $this->belongsTo('App\Models\Site\Evaluation\Evaluation', 'evaluation_id');
    }

    function QuestionTopic() {
        return $this->belongsTo('App\Models\Site\Evaluation\QuestionTopic', 'question_topic_id');
    }

    function QuestionType() {
        return $this->belongsTo('App\Models\Site\Evaluation\QuestionType', 'question_type_id');
    }

    function PossiblesQuestionAnswers() {
        return $this->hasMany('App\Models\Site\Evaluation\PossibleQuestionAnswer', 'available_question_id');
    }

    function ResponsesReceived() {
        return $this->hasMany('App\Models\Site\Evaluation\ResponseReceived', 'available_question_id');
    }
}
