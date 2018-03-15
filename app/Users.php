<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function skills(){
        return $this->belongsToMany('App\Skill','users_skills','user_id','skill_id');
    }


    public function topThreeSkills(){
        return $this->belongsToMany('App\Skill','top_three_skills','user_id','skill_id');
    }

    public function socialNetworks(){
        return $this->belongsToMany('App\SocialNetwork','social_networks_users','user_id','social_network_id')->withPivot('url');
    }

    public function experiences(){
        return $this->hasMany('App\Experience','user_id');
    }

    public function languages(){
        return $this->hasMany('App\Languages','user_id');
    }




    protected $table = 'users';
}
