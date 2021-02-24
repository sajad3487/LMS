<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Quiz\Entities\quiz;

class answerQuiz extends Model
{
    protected $fillable = [
        'form_id',
        'parent_id',
        'first_name',
        'last_name',
        'email',
        'first_info',
        'second_info',
        'date_info',
        'score',
        'type',
    ];

    public function quiz_answer (){
        return $this->hasMany(answerQuiz::class,'parent_id','id');
    }

    public function question_answer (){
        return $this->hasMany(answerQuestion::class,'answer_id','id');
    }

    public function quiz (){
        return $this->hasOne(quiz::class,'id','form_id');
    }
}
