<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    use SoftDeletes;
    protected $table='comments';
    protected $primaryKey='id';
    protected $fillable=['comment','writer','status','article_id'];
    protected $date=['deleted_at'];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

}
