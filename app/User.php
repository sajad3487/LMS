<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Evaluation\Entities\AnswerEvaluation;
use Modules\Evaluation\Entities\Circle;
use Modules\Evaluation\Entities\Company;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','business_name', 'email', 'password','tel','user_type','profile_picture','address','zip_code','position','company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function circles (){
        return $this->belongsToMany(Circle::class)->where('status','>','2');
    }

    public function company (){
        return $this->hasOne(Company::class,'id','company_id');
    }

}
