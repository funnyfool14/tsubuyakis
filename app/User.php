<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function tsubuyakis()
    {
        return $this->hasMany(Tsubuyaki::class);
    }
    
    
    public function followings()
    {
        return $this->belongsToMany(User::class,'omoibito','user_id','omoibito_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class,'omoibito','omoibito_id','user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        $exist=$this->is_following($userId);
        $its_me=$this->id==$userId;
        
        if($exist||$its_me){
            return false;
        }
        else{
            $this->followings()->attach($userId);
            return true;
        }
    }
    public function unfollow($userId)
    {
       $exist=$this->is_following($userId);
       $its_me=$this->id==$userId;
       
       if($exist&&!$its_me){
           $this->followings()->detach($userId);
           return true;
       }
       else{
           return false;
       }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('omoibito_id',$userId)->exists();
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['tsubuyakis','followings','followers','sasatteru']);
    }
    
    public function feed_tsubuyakis()
    {
        $userIds=$this->followings()->pluck('users.id')->toArray();
        $userIds[]=$this->id;
        return Tsubuyaki::whereIn('user_id',$userIds);
    }
    
    public function sasatteru()
    {
        return $this->belongsToMany(Tsubuyaki::class,'sasatta','user_id','tsubuyaki_id')->withTimestamps();
    }
    
    public function  sasatta($tsubuyakiId)
    {
        $exist=$this->is_sasatteru($tsubuyakiId);
        //自分の投稿はお気に入りにできないようにする設定はどうやるのか？
        //$its_mine=$this->tsubuyaki_id==$tsubuyakiId;
        //if($exist|$its_mine){
        if($exist){
            return false;
        }
        else{
            $this->sasatteru()->attach($tsubuyakiId);
            return true;
        }
    }
    
    public function mouii($tsubuyakiId)
    {
        $exist=$this->is_sasatteru($tsubuyakiId);
        
        if($exist){
            $this->sasatteru()->detach($tsubuyakiId);
            return true;
        }
        else{
            return fslse;
        }
    }
    
    public function is_sasatteru($tsubuyakiId)
    {
        return $this->sasatteru()->where('tsubuyaki_id',$tsubuyakiId)->exists();
    }
}
