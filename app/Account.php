<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    
    protected $table = "accounts";
    protected $primaryKey='id';
    protected $fillable =['user_id','full_name','super_admin','mobile','image'];

    function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    function articles(){
        return $this->hasMany('App\Article');
    }
    public function links()
    {
        return $this->belongsToMany('App\Link');
    }
}
