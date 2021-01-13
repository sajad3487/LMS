<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'first_name_label',
        'first_name_requirement',
        'last_name_label',
        'last_name_requirement',
        'email_label',
        'email_requirement',
        'placeholder',
        'status',
        'taken',
        'average_score',
        'average_percentage',
        'button_text',
    ];

    public function question (){
        return $this->hasMany(question::class,'form_id','id');
    }
}
