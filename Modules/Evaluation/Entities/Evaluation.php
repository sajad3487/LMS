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
        'contact',
        'start',
        'deadline',
    ];

    public function user (){
        return $this->hasOne(User::class,'id','user_id');
    }
}
