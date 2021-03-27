<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    protected $fillable  = ['cat_id','title','img','content','by_admin'];

    public function cat()
    {
       return $this->belongsTo('App\Category');
    }
}
