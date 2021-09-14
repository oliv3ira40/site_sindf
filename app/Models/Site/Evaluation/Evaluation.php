<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $fillable = [
        'name', // 200
        'name_slug', // 200
        'description', // 1000
    ];


    function CompletedEvaluations() {
        return $this->hasMany('App\Models\Site\Evaluation\CompletedEvaluation', 'evaluation_id');
    }

    function ImagesForEvaluation() {
        return $this->hasMany('App\Models\Site\Evaluation\ImageForEvaluation', 'evaluation_id');
    }

    function EvaluationSettings() {
        return $this->hasOne('App\Models\Site\Evaluation\EvaluationSetting', 'evaluation_id');
    }

    function QuestionTopics() {
        return $this->hasMany('App\Models\Site\Evaluation\QuestionTopic', 'evaluation_id');
    }

    function AvailableQuestions() {
        return $this->hasMany('App\Models\Site\Evaluation\AvailableQuestion', 'evaluation_id');
    }

    function ResponsesReceived() {
        return $this->hasMany('App\Models\Site\Evaluation\ResponseReceived', 'evaluation_id');
    }
}
