<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blogger extends Authenticatable
{
    use Notifiable;

    protected $guard = 'blogger';

    public function aboutUs()
    {
        return $this->hasOne('\App\model\aboutusResturent', 'Resturnt_id');
    }

    public function getImg()
    {
        return $this->hasMany('\App\model\imgResturent', 'Resturnt_id');
    }

    public function categories()
    {
        return $this->hasMany('\App\model\category', 'Resturnt_id');
    }

    public function getServes()
    {
        return $this->hasMany('\App\model\servesResturent', 'Resturnt_id');
    }

    public function getAdds()
    {
        return $this->hasMany('\App\model\addsRestaurant', 'Resturnt_id');
    }


    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
