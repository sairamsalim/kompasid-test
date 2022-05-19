<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    protected $connection = 'experts';
	protected $table = 'experts';
    protected $fillable = [
        'name', 'email', 'password', 'username', 'date', 'phone', 'status'
    ];
}
