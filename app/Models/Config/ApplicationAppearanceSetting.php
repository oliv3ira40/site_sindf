<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class ApplicationAppearanceSetting extends Model
{
    protected $table = 'application_appearance_settings';
    protected $fillable = [
        'logo_for_white_background',
        'logo_for_black_background',
        'reduced_logo',
        'favicon',
    ];
}
