<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function experience(){
        return $this->belongsTo('App\Experience');
    }

    protected $table = 'projects';
}
