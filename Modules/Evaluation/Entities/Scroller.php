<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class Scroller extends Model
{
    protected $fillable = [
        'circle_id',
        'behavior_id',
        'min',
        'max',
        'type',
        'title',
        'description',
        'status',
    ];

    public function behavior (){
        return $this->belongsTo(Behavior::class,'behavior_id','id');
    }

    public function circle (){
        return $this->belongsTo(Circle::class,'circle_id','id');
    }

    public function scroller_answers_detail (){
        return $this->hasMany(AnswerScroller::class,'scroller_id','id')->where('type','behavior_detail');
    }

}
