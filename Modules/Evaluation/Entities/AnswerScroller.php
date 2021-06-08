<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class AnswerScroller extends Model
{
    protected $fillable = [
        'parent_id',
        'evaluation_id',
        'circle_id',
        'owner_id',
        'scroller_id',
        'user_id',
        'score',
        'type',
    ];

    public function answer_scroller_detail (){
        return $this->hasMany(AnswerScroller::class,'parent_id','id');
    }

    public function scroller (){
        return $this->hasOne(Scroller::class,'id','scroller_id');
    }

    public function behavior () {
        return $this->belongsTo(Behavior::class,'owner_id','id');
    }
}
