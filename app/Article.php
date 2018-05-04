<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    function comments(){
    	return $this->hasMany('App\Comment', 'article_id', 'id');
    }

    function user(){
    	return $this->belongsTo('App\User','author', 'id');
    }
    

    protected $table = "articles";
    public $timestamps = true;
    protected $fillable = ['author', 'id'];


    

}
