<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table="order";
    protected $fillable=['Resturnt_id','meal_id','user_id','quantity','salary','time'];
}
