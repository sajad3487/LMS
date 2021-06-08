<?php

namespace Modules\Evaluation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'parent_id',
        'mentor_id',
        'user_id',
        'name',
        'description',
        'company',
        'target',
        'active_circle_id',
        'status',
        'start',
        'deadline',
    ];

    public function user (){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function circles (){
        return $this->hasMany(Circle::class,'evaluation_id','id');
    }

    public function active_circle (){
        return $this->hasOne(Circle::class,'id','active_circle_id');
    }

    public function behaviors (){
        return $this->hasMany(Behavior::class,'evaluation_id','id');
    }
}
