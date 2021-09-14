<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;

class FeaturedPost extends Model
{
    protected $table = 'featured_posts';
    protected $fillable = [
        'order',
        'post_id',
    ];



    function Post() {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
