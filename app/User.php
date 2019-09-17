<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

//
use App\Notifications\Auth\SendResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'email', 'password', 'phone', 'photo', 'birth_at', 'town', 'type', 'notify_phone', 'notify_email', 'discount'
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new SendResetPassword($token));
    }

    public function favorites_products()
    {
        return $this->belongsToMany('App\Models\Gproduct', 'favorites_products', 'user_id', 'gproduct_id')->whereHas('productsNew');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'users_roles', 'user_id', 'role_id');
    }

    public function isAdmin()
    {
        return in_array('admin', array_pluck($this->roles->toArray(), 'name'));
    }

    public function isManager()
    {
        return in_array('manager', array_pluck($this->roles->toArray(), 'name'));
    }

    public function isAdministration()
    {
        $flag_1 = in_array('admin', array_pluck($this->roles->toArray(), 'name'));
        $flag_2 = in_array('manager', array_pluck($this->roles->toArray(), 'name'));

        if($flag_1 || $flag_2){
            return true;
        }else{
            return false;
        }
    }
}
