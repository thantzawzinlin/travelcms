<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    public function Category(){
        return $this->belongsTo('App\Category');
    }
    protected $fillable=['title','picture','cat_id','content','slug'];//it is important to add slug with mass assignment problem

    public function getimageAttribute($image)
    {
        return asset($image);
    } //မပါလဲရ image show 
}
