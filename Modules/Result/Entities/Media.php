<?php

namespace Modules\Result\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'type',
        'media_path',
        'title',
        'description',
    ];

    public function result (){
        return $this->belongsToMany(result::class);
    }
}
