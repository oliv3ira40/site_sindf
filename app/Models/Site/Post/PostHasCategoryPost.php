<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;

class PostHasCategoryPost extends Model
{
    protected $table = 'posts_has_categories_posts';
    protected $fillable = [
        'post_id',
        'category_post_id',
    ];
}
