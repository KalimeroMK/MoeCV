<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{


    public function users(){
        $this->belongsToMany('App\Users','social_networks_users','social_network_id','user_id')->withPivot('url');;
    }


    protected $table = 'social_networks';
}
