<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function updateUser($user)
    {

        return  \DB::select("UPDATE users SET name='$user[0]',email='$user[2]' WHERE id=$user[1]");


    }


    public function isAdmin()
    {

        return Auth::user()->is_admin == 1;
    }

    public function updatePassword($password,$user)
    {
//echo "yes";die();
        return  \DB::select("UPDATE users SET password='$password' WHERE id=$user");
    }
}
