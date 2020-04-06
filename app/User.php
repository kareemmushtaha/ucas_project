<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

     /**
      * The attributes that are mass assignable.
     *
     * @var array
     */

/*-------------------          Many To Many Meal and User           ---------------------*/
    public function meal()
    {
        return $this->belongsToMany('\App\model\meal', 'meal_user','user_id','meal_id');
    }
    /*-------------------       End Many To Many Meal and User           ---------------------*/

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
