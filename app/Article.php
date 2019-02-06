<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    protected $table = "articles";
    protected $fillable =['title','category_id','summary','news','imge','active','publish','account_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
	public function account()
    {
        return $this->belongsTo('App\Account');
    }
    function comments(){
        return $this->hasMany('App\Comment');
    }
}
