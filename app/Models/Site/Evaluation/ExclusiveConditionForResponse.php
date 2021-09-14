<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class ExclusiveConditionForResponse extends Model
{
    protected $table = 'exclusive_conditions_for_responses';
    protected $fillable = [
        'name', // 300
        'description', // 1000
        'tag', // 200
    ];
}
