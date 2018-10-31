<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //
    protected $fillable = [
        'type',
        'mime',
        'path',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo('App\product','product_id','id');
    }
}
