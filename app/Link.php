<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    protected $table = "links";
    protected $fillable =['title','url','parent_id'];

    public function account()
    {
        return $this->belongsToMany('App\Account');
    }
}
