<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'form_id',
        'position',
        'body',
        'additional_info',
        'status',
        'requirement',
    ];

    public function option (){
        return $this->hasMany(option::class,'question_id','id');
    }
}
