<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // video to tag
    public  function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
}
