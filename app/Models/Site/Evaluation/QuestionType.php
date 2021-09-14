<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    protected $table = 'question_types';
    protected $fillable = [
        'name', // 20
        'tag', // 20
        'description', // 200
    ];
}
