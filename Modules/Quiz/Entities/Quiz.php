<?php

namespace Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Result\Entities\result;

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
        'third_info_label',
        'third_info_status',
        'date_info_label',
        'date_info_status',
        'placeholder',
        'status',
        'taken',
        'average_score',
        'average_percentage',
        'button_text',
        'type',
        'intro_video',
        'banner',
        'result_banner',
    ];

    public function question (){
        return $this->hasMany(question::class,'form_id','id');
    }

    public function quiz (){
        return $this->hasMany(quiz::class,'parent_id','id')->where('type','subquiz');
    }

    public function segment (){
        return $this->hasMany(result::class,'form_id','id');
    }

    public function parent (){
        return $this->belongsTo(quiz::class,'parent_id','id')->where('type','super');
    }

}
