<?php

namespace Modules\Evaluation\Entities;

use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    protected $fillable = [
        'evaluation_id',
        'user_id',
        'body',
        'first_score',
        'average_score',
        'status',
    ];

    public function scrollers (){
        return $this->hasMany(Scroller::class,'behavior_id','id')->where('type','behavior');
    }

}
