<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Result\Entities\answerQuestion;

class question extends Model
{
    protected $fillable = [
        'form_id',
        'parent_id',
        'position',
        'type',
        'body',
        'description',
        'additional_info',
        'status',
        'requirement',
        'media',
    ];

    public function option (){
        return $this->hasMany(option::class,'question_id','id');
    }

    public function answer (){
        return $this->hasMany(answerQuestion::class,'question_id','id');
    }

    public function question (){
        return $this->hasMany(question::class,'parent_id','id');
    }
}
