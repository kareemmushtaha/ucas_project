<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class TypeRestaurant extends Model
{
    protected $table = "type_restaurant";
    protected $fillable = ['Type_Name'];

    public function AllRestaurantType()
    {
        return $this->hasMany('\App\Blogger', 'TypeOf_id');
    }
}
