<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    protected $fillable = [
        'question_id',
        'form_id',
        'score',
        'body',
        'tag_score',
        'status',
        'additional_info',
    ];
}
