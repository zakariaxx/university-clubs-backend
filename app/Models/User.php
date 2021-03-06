<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Observer;
use Subject;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable,HasFactory;


    protected $table = 'users';

    public function club_members()
    {
        return $this->hasOne(ClubMember::class, 'id_user', 'id');
    }

    public function admins()
    {
        return $this->hasOne(Admin::class, 'id_user', 'id');
    }

    const VERIFIED_USER = true;
    const UNVERIFIED_USER = false;

    const ADMIN_USER = true;
    const REGULAR_USER = false;

    const ACTIVATE_USER = true;
    const DESACTIVATE_USER = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'password',
        'photo',
        'phone_number',
        'verification_token',
        'verified',
        'activate',
        'civility',
        'admin',
        'club_office_member',
        'id_club'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

      /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /*
    functions for verifications
    */

    public function isVerified(){
        return $this->verfied = User::VERIFIED_USER;
    }

    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }

    public function isActivate(){
        return $this->admin = User::ACTIVATE_USER;
    }

    public static function generateVericationCode(){
        return Str::random(40);

    }

    /*
     Over right the Observer method
    */

  /*   public function update(Subject $subject)
    {

    } */
}
