<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $connection = 'users';
	protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password', 'username', 'date', 'phone', 'status'
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
