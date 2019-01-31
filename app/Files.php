<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{
    //
    use SoftDeletes;
    protected $table='files';
    protected $primaryKey='id';
    protected $fillable=['file','article_id'];
    protected $date=['deleted_at'];

    public function news()
    {
        return $this->belongsTo('App\news');
    }

}
