<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    protected $connection = 'transactions';
	protected $table = 'methods';
    public $timestamps = false;
	protected $fillable = [
        'id', 'name', 'image', 'currency_code', 'guideline', 'type', 'bank_account_name', 'bank_account_number', 'status'
    ];
}
