<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class QuestionTopic extends Model
{
    protected $table = 'question_topics';
    protected $fillable = [
        'position',
        'name', // 200
        'description',
        'evaluation_id',
    ];


    function Evaluation() {
        return $this->belongsTo('App\Models\Site\Evaluation\Evaluation', 'evaluation_id');
    }

    function AvailableQuestions() {
        return $this->hasMany('App\Models\Site\Evaluation\AvailableQuestion', 'question_topic_id');
    }
}
