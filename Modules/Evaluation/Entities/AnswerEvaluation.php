<?php

namespace Modules\Evaluation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerEvaluation extends Model
{
    protected $fillable = [
        'parent_id',
        'evaluation_id',
        'circle_id',
        'not_id',
        'user_id',
        'body',
        'type',
    ];

    public function answer_detail (){
        return $this->hasMany(AnswerEvaluation::class,'parent_id','id');
    }

    public function circle (){
        return $this->belongsTo(Circle::class,'circle_id','id');
    }

    public function not (){
        return $this->hasOne(Note::class,'id','not_id');
    }

    public function user (){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
