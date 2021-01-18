<?php

namespace Modules\Result\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Quiz\Entities\option;
use Modules\Quiz\Entities\question;

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

    public function question (){
        return $this->hasOne(question::class,'id','question_id');
    }

    public function taken (){
        return $this->hasOne(answerQuiz::class,'id','answer_id');
    }

    public function option (){
        return $this->hasOne(option::class,'id','option_id');
    }

}
