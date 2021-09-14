<?php

namespace App\Models\Site\Evaluation;

use Illuminate\Database\Eloquent\Model;

class EvaluationSetting extends Model
{
    protected $table = 'evaluation_settings';
    protected $fillable = [
        'answered_only_once_per_user',
        'send_notification_for_each_assessment',
        'login_required',
        'allow_specific_groups_of_users',
        'poll_start',
        'end_of_polls',
        'evaluation_id',
    ];
    protected $dates = ['created_at', 'poll_start', 'end_of_polls'];
}
