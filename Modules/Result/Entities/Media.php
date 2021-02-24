<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'type',
        'media_path',
        'title',
        'description',
    ];
}
