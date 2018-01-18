<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class post extends Model
{
    public function tags()
    {
    	return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
    }

    public function getSlugAttribute($value){
        return route('post',$value);
    }
    public function likes()
    {
        return $this->hasMany('App\Model\user\like');
    }

    public function users()
    {
        return $this->belongsToMany('App\Model\user\User','likes');
    }

}
