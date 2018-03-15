<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{

    public function users(){
        return $this->belongsTo('App\Users','user_id');
    }

    protected $table = 'languages_users';

}
