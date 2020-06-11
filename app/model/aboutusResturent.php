<?php

namespace app\model;

use Illuminate\Database\Eloquent\Model;

class aboutusResturent extends Model
{
    protected $table = "aboutus_resturent";
    protected $fillable = ['aboutUs', 'adress', 'phone1', 'phone2', 'telephon', 'Resturnt_id'];

    public function Restaurant()
    {
        return $this->belongsTo('\App\Blogger', 'Resturnt_id');
    }


}