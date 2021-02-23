<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'description',
        'first_name_label',
        'first_name_requirement',
        'last_name_label',
        'last_name_requirement',
        'email_label',
        'email_requirement',
        'first_info_label',
        'first_info_status',
        'second_info_label',
        'second_info_status',
        'date_info_label',
        'date_info_status',
        'placeholder',
        'status',
        'taken',
        'average_score',
        'average_percentage',
        'button_text',
        'type',
        'banner',
        'result_banner',
    ];

    public function question (){
        return $this->hasMany(question::class,'form_id','id');
    }

    public function quiz (){
        return $this->hasMany(quiz::class,'parent_id','id');
    }
}
