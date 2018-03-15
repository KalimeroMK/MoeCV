<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    public function users(){
        return $this->belongsTo('App\Users','user_id');
    }

    public function experienceType(){
        return $this->belongsTo('App\ExperienceType');
    }

    public function projects(){
        return $this->hasMany('App\Project');
    }

    protected $table = 'experiences';
}
