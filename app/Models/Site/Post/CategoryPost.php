<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'categories_posts';
    protected $fillable = [
        'name', // 30
        'private',
    ];



    function PostsHasCategoriesPosts() {
        return $this->hasMany(PostHasCategoryPost::class, 'category_post_id');
    }
}
