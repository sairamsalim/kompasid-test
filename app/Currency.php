<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $connection = 'currencies';
	protected $table = 'currencies';
    public $timestamps = false;
	protected $fillable = [
        'code', 'name'
    ];
}
