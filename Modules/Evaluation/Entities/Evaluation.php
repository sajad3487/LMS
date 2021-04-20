<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'company',
        'contact',
        'start',
        'deadline',
    ];
}
