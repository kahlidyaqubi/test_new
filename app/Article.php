<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    
    protected $table = "articles";
    protected $fillable =['title','category_id','summary','news','imge','active','publish'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
