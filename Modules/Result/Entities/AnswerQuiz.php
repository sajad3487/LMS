<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;

class answerQuiz extends Model
{
    protected $fillable = [
        'form_id',
        'first_name',
        'last_name',
        'email',
        'score',
    ];

    public function question_answer (){
        return $this->hasMany(answerQuestion::class,'answer_id','id');
    }
}
