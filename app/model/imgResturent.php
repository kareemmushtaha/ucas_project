<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class imgResturent extends Model
{
    protected $table="imgresturent";
    protected $fillable=['img','details','Resturnt_id'];

    public function getRestaurantByImg(){
        return $this->belongsTo('\App\Blogger','Resturnt_id');
    }
}
