<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasBundle extends Model
{
    protected $connection = 'users';
	protected $table = 'user_has_bundles';
    public $timestamps = false;
	protected $fillable = [
        'id', 'bundle_id', 'user_id', 'video_quota', 'voice_quota', 'text_quota', 'expired_at', 'status'
    ];
}
