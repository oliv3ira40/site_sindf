<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;

class PostHasTagPost extends Model
{
    protected $table = 'posts_has_tags_posts';
    protected $fillable = [
        'post_id',
        'tag_post_id',
    ];
}
