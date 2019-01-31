<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    
    protected $table = "accounts";
    protected $primaryKey='id';
    protected $fillable =['user_id','full_name','mobile','image'];

    function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function links()
    {
        return $this->belongsToMany('App\Link');
    }
}
