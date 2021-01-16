<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;

class answerQuestion extends Model
{
    protected $fillable = [
        'form_id',
        'answer_id',
        'question_id',
        'option_id',
        'type',
        'answer',
        'additional_info',
        'score',
    ];
}
