<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table="order";
    protected $fillable=['id','Resturnt_id','meal_id','user_id','cart'];



    public  function user(){
        return $this->belongsTo('App\User','id');
    }





}
