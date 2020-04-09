<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    protected $fillable=['user_id','faceboo','avartar','youtube','about'];
}
