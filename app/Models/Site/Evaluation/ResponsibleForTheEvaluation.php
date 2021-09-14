<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class ResponsibleForTheEvaluation extends Model
{
    protected $table = 'responsibles_for_the_evaluation';
    protected $fillable = [
        'name', // 200
        'email', // 150
        'evaluation_setting_id',
    ];
}
