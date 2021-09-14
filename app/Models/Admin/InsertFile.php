<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class InsertFile extends Model
{
    protected $table = 'insert_files';
    protected $fillable = [
        'name',
        'extension',
        'path',
    ];
}
