<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class ImageForEvaluation extends Model
{
    protected $table = 'images_for_evaluations';
    protected $fillable = [
        'position',
        'name', // 150
        'name_slug', // 150
        'path', // 300
    ];
}
