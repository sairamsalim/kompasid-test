<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstitutionHasQuota extends Model
{
    protected $connection = 'institutions';
	protected $table = 'institution_has_quotas';
    public $timestamps = false;
	protected $fillable = [
        'id', 'text_quota', 'video_quota', 'voice_quota', 'institution_id', 'type'
    ];
}
