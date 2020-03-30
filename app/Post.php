<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Category(){
        return $this->belongsTo('App\Category');
    }
    protected $fillable=['title','picture','cat_id','content'];

    public function getimageAttribute($image)
    {
        return asset($image);
    } //မပါလဲရ image show 
}
