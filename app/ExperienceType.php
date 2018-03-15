<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExperienceType extends Model
{
    public function experience(){
        return $this->hasMany('App/Experience');
    }
    protected $table = 'experience_types';
}
