<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class servesResturent extends Model
{
    protected $table = "serves_resturent";
    protected $fillable = ['serves_name', 'Resturnt_id'];


    public function getRestaurantByServes()
    {
        return $this->belongsTo('\App\Blogger', 'Resturnt_id');
    }
}
