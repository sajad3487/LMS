<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'circle_id',
        'type',
        'title',
        'description',
        'status',
    ];

    public function answers (){
        return $this->hasMany(AnswerEvaluation::class,'not_id','id');
    }
}
