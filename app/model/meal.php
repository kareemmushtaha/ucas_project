<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class meal extends Model
{
    protected $table="meal_resturent";
    protected $fillable=['name','img','details','price','category_id','Resturnt_id'];
}
