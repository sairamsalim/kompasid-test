<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $connection = 'chats';
	protected $table = 'chats';
    public $timestamps = false;
	protected $fillable = [
        'id', 'url', 'text', 'chatroom_id', 'user_id', 'expert_id', 'status', 'reject_id', 'created_at'
    ];
}
