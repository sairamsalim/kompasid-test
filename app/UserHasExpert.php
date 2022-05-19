<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasExpert extends Model
{
    protected $connection = 'users';
	protected $table = 'user_has_experts';
    public $timestamps = false;
	protected $fillable = [
        'id', 'expert_id', 'user_id', 'user_has_bundle_id'
    ];
}
