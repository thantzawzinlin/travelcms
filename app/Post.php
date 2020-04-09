<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
class Post extends Model
{
    use SoftDeletes;
    public function category(){
        return $this->belongsTo('App\Category');
    }
    protected $fillable=['title','picture','category_id','content','slug','user_id'];//it is important to add slug with mass assignment problem

    public function getimageAttribute($image)
    {
        return asset($image);
    } //မပါလဲရ image show 

    protected $dates = ['deleted_at'];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo(User::class);//post<->user One To Many Relationship
    }
    //Trix Editor
    // use HasTrixRichText;
    
    // protected $guarded = [];
     
}
