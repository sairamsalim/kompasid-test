<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $connection = 'transactions';
	protected $table = 'incomes';
	protected $fillable = [
        'id', 'value', 'expert_id', 'user_id', 'currency_code', 'chat_id', 'created_at', 'updated_at', 'status', 'method_id', 'image', 'bank_name', 'bank_account_name', 'bank_account_number', 'expired_at'
    ];
}
