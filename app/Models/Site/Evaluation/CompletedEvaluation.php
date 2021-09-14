<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class CompletedEvaluation extends Model
{
    protected $table = 'completed_evaluations';
    protected $fillable = [
        'user_id',
        'evaluation_id',
        'ip_adress',
    ];



    function User() {
        return $this->belongsTo('App\Models\Admin\User', 'user_id');
    }
    
    function Evaluation() {
        return $this->belongsTo('App\Models\Site\Evaluation\Evaluation', 'evaluation_id');
    }
}
