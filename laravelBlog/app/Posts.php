<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //table name
    public $table='posts';
    public $primaryKey='id';
    public $timestamp=true;

// creating a relationship between user and the posts of the same user
    public function user(){
        return $this->belongsTo('App\User');
    }

}
