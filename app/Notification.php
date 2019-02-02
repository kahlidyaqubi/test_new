<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //
    
    protected $table = "notifications";
    protected $primaryKey='id';
    protected $fillable =['user_id','title','link','type','read_at'];

    function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
