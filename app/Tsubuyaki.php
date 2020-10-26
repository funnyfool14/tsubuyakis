<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tsubuyaki extends Model
{
    protected $fillable=['content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function sashita()
    {
       return $this->belongsToMany(User::class,'sasatta','tsubuyaki_id','user_id')->withTimestamps();
    }
}
