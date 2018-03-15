<?php

namespace App\Http\Controllers;

use App\City;
use App\ExperienceType;
use App\Skill;
use Illuminate\Http\Request;

class GenerateJsonController extends Controller
{
    public function skills(){
        $skill = Skill::where('custom',0)->get();

        echo $skill;


//        return \Response::json($skill);


    }

    public function cities(){
        $cities = City::whereNotNull('name')->get();

        echo $cities;
    }

    public function experiences(){
        $experiences = ExperienceType::all();

        echo $experiences;
    }
}
