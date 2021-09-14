<?php

namespace App\Models\Site\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'title', //500
        'slug_title', //500
        'thin_line', //5000
        'content', //15000
        'metakey', //400
        'image_banner', //300
        'image_spotlight', //300
        'health_calendar',
        
        'author_id',
        'created_by_id',
        
        'created_at',
        'status_post_id',
        'private',
    ];



    function PostsHasCategoriesPosts() {
        return $this->hasMany('App\Models\Site\Post\PostHasCategoryPost', 'post_id');
        
    }
    function PostsHasTagsPosts() {
        return $this->hasMany('App\Models\Site\Post\PostHasTagPost', 'post_id');
    }
    function Author() {
        return $this->belongsTo('App\Models\Admin\User', 'author_id');
    }
    function CreatedBy() {
        return $this->belongsTo('App\Models\Admin\User', 'created_by_id');
    }
    function StatusPost() {
        return $this->belongsTo('App\Models\Site\Post\StatusPost', 'status_post_id');
    }
    
    function SliderSite() {
        return $this->hasOne('App\Models\Site\Home\SliderSite', 'post_id');
    }
}