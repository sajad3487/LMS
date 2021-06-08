<?php

namespace Modules\Evaluation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'owner_id',
        'parent_id',
        'destination_id',
        'type',
        'body',
        'status',
    ];

    public function owner (){
        return $this->hasOne(User::class,'id','owner_id');
    }
}
