<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class adsRestaurant extends Model
{
    protected $table="adds_resturent";
    protected $fillable=['img','details','finish_add','Resturnt_id'];

    public function getRestaurantByAdd()
    {
        return $this->belongsTo('\App\Blogger', 'Resturnt_id');
    }
}
