<?php

namespace App\Models\Site\Home;

use Illuminate\Database\Eloquent\Model;

class SliderSite extends Model
{
    protected $table = 'sliders_site';
    protected $fillable = [
        'title', // '80'
        'subtitle', // '100'
        'img', // '400'
        'link', // '400'
        'target', // '10'
        'post_id',
    ];



    function Post() {
        return $this->belongsTo('App\Models\Site\Post\Post', 'post_id');
    }
}
