<?php

namespace Modules\Evaluation\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'address',
        'website',
        'email',
        'type',
    ];

    public function users (){
        return $this->hasMany(User::class,'company_id','id')->where('user_type',3);
    }
}
