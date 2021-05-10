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
        return $this->hasMany(Note::class,'circle_id','id');
    }

    public function users (){
        return $this->belongsToMany(User::class);
    }
}
