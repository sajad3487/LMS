<?php

namespace Modules\Evaluation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $fillable = [
        'parent_id',
        'status',
        'evaluation_id',
        'user_id',
        'title',
        'start_date',
        'end_date',
    ];

    public function questions (){
        return $this->hasMany(Note::class,'circle_id','id')->where('type','question');
    }

    public function users (){
        return $this->belongsToMany(User::class);
    }

    public function answers (){
        return $this->hasMany(AnswerEvaluation::class,'circle_id','id')->where('parent_id',0);
    }

    public function target (){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function report (){
        return $this->hasOne(Note::class,'circle_id','id')->where('type','report');
    }

    public function journal (){
        return $this->hasMany(Note::class,'circle_id','id')->where('type','journal');
    }

    public function scrollers (){
        return $this->hasMany(Scroller::class,'circle_id','id')->where('type','behavior');
    }

}
