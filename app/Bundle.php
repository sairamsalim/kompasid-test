<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    protected $connection = 'bundles';
	protected $table = 'bundles';
    public $timestamps = false;
	protected $fillable = [
        'id', 'name', 'video_quota', 'voice_quota', 'text_quota', 'expert_quota', 'status', 'recommended', 'gradient_start', 'gradient_end', 'description', 'badge'
    ];
}
