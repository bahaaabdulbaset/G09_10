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


    public function gender() {
        return $this->belongsTo(\App\Gender::class, 'gender_id', 'id');
    }

    public function image() {
        return $this->belongsTo(\App\Image::class, 'image_id', 'id');
    }

    public function sentMessages() {
        return $this->hasMany(\App\Chat::class, 'first_user_id', 'id');
    }

    public function receivedMessages() {
        return $this->hasMany(\App\Chat::class, 'second_user_id', 'id');
    }
}
