<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function users(){
        return $this->belongsToMany('App\Users','users_skills','skill_id','user_id');
    }
}
