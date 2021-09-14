<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class AllowedGroup extends Model
{
    protected $table = 'allowed_groups';
    protected $fillable = [
        'evaluation_setting_id',
        'group_id',
    ];
}
