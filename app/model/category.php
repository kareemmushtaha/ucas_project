<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = "category";
    protected $fillable = ['category_name', 'Resturnt_id'];


    public function restaurant()
    {
        return $this->belongsTo('App\Blogger', 'Resturnt_id');
    }

    public function getMealCategory()
    {
        return $this->hasMany('\App\model\meal', 'category_id');
    }


}
