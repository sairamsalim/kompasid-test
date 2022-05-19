<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BundlePrice extends Model
{
    protected $connection = 'bundles';
	protected $table = 'bundle_has_prices';
    public $timestamps = false;
	protected $fillable = [
        'id', 'bundle_id', 'price', 'currency_code', 'period'
    ];
}
