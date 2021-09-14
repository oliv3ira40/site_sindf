<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class ApplicationSetting extends Model
{
    protected $table = 'application_settings';
    protected $fillable = [
        'app_name', // 200
        'copyright', // 300
    ];
}
