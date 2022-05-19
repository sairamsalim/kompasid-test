<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $connection = 'chats';
	protected $table = 'chatrooms';
	protected $fillable = [
        'id', 'user_id', 'expert_id', 'status', 'updated_at', 'status_user', 'status_expert'
    ];
}
