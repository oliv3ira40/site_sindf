<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;

class StatusPost extends Model
{
    protected $table = 'status_posts';
    protected $fillable = [
        'name', // 30
    ];



    function Post() {
        return $this->hasMany('App\Models\Site\Post\Post', 'status_post_id');
    }
}
