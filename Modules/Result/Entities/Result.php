<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    protected $fillable = [
        'form_id',
        'min_score',
        'max_score',
        'segment_title',
        'result_body',
        'result_media',
        'status',
    ];
}
