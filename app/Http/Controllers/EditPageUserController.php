<?php

namespace App\Http\Controllers;

use App\City;
use App\Experience;
use App\Languages;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditPageUserController extends Controller
{


    public function saveUserInfo(Request $request){
        $data = $request->all();

        $cityId = $data['cityId'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $phoneNumber = $data['phoneNumber'];
        $user = Users::find(Auth::id());

        $city = City::find($cityId);

        if ($city === null){
           $city = new City();
           $city->name = $cityId;
           $city->custom = true;
           $city->save();
           $cityId = $city->id;
        }


        $user->city_id = $cityId;
        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->phone = $phoneNumber;
        $user->save();
    }

    public function saveWorkExperience(Request $request){
        $data = $request->all();

        if(!(array_key_exists('workExperience',$data))) return \Response::json('error');
        if(!(array_key_exists('currentJob',$data))) return \Response::json('error');

        $workExperienceArray = $data['workExperience'];

        $currentJob = $data['currentJob'];
        $userCurrentJob = Auth::user();
        $userCurrentJob->job = $currentJob['position'];
        $userCurrentJob->save();
//        return \Response::json($workExperienceArray);
        foreach ($workExperienceArray as $workExperience){
            $position = $workExperience['position'];
            $company = $workExperience['company'];
            $webpage = $workExperience['webPage'];
            $description = $workExperience['description'];
            $dateFrom = $workExperience['dateFrom'];
            $dateTo = $workExperience['dateTo'];


            $user = Auth::user();
            if(array_key_exists('id',$workExperience)){
                $experience = Experience::find($workExperience['id']);


                if($workExperience['deleted'] === 'true'){
                    $experience->delete();
                    continue;
                }

            }else{
                if($workExperience['deleted'] === 'true') continue;
                $experience = new Experience();
            }

            $experience->users()->associate($user);
            $experience->position = $position;
            $experience->webpage = ((substr( $webpage, 0, 7 ) === "http://") || (substr( $webpage, 0, 8 ) === "https://")) ? $webpage : 'http://'.$webpage;
            $experience->info = $description;
            $experience->company = $company;
            $experience->experience_type_id = 2;
            $experience->from = $dateFrom;
            $experience->to = (trim($dateTo) === '') ? null : $dateTo;
            $experience->save();


        }

        return \Response::json($workExperience);

    }

    public function saveEducationExperience(Request $request){
        $data = $request->all();

        if(!(array_key_exists('educationExperience',$data))) return \Response::json('error');
        if(!(array_key_exists('currentEducation',$data))) return \Response::json('error');

        $educationExperienceArray = $data['educationExperience'];
        $currentEducation = $data['currentEducation'];
        $userCurrentEducation = Auth::user();
        $userCurrentEducation->degree = $currentEducation['degree'];
        $userCurrentEducation->save();
//                return \Response::json($educationExperienceArray);

        foreach ($educationExperienceArray as $educationExperience){

            /**
             * Degree is saved in position column in experience table
             *
             */
            $position = $educationExperience['degree'];
            $company = $educationExperience['institution'];
            $webpage = $educationExperience['webPage'];
            $description = $educationExperience['description'];
            $dateFrom = $educationExperience['dateFrom'];
            $dateTo = $educationExperience['dateTo'];


            $user = Auth::user();

            if(array_key_exists('id',$educationExperience)){
                $experience = Experience::find($educationExperience['id']);
                if($educationExperience['deleted'] === 'true'){
                    $experience->delete();
                    continue;
                }
            }else{

                if($educationExperience['deleted'] === 'true') continue;
                $experience = new Experience();
            }

            $experience->users()->associate($user);
            $experience->position = $position;
            $experience->webpage = ((substr( $webpage, 0, 7 ) === "http://") || (substr( $webpage, 0, 8 ) === "https://")) ? $webpage : 'http://'.$webpage;
            $experience->info = $description;
            $experience->company = $company;
            $experience->experience_type_id = 1;
            $experience->from = $dateFrom;
            $experience->to = $dateTo;
            $experience->save();


        }

        return \Response::json('hi');
    }

    public function getAllUserData(){
        $user = Users::with(['skills','city','topThreeSkills','experiences','socialNetworks','languages'])->where('id',\Auth::id())->first();

        return \Response::json($user);
    }

    public function saveLanguage(Request $request){

        $data = $request->all();
        if(!(array_key_exists('language',$data))) return \Response::json('error');

        $languageArray = $data['language'];


        $user = Auth::user();




        foreach ($languageArray as $languageValue){
            if(array_key_exists('id',$languageValue)){
                $language = Languages::find($languageValue['id']);
                if($languageValue['deleted'] === 'true'){

                    $language->delete();
                    continue;
                }
            }else{
                $language = new Languages();
            }
            $language->name = $languageValue['name'];
            $language->level = $languageValue['level'];
            $language->user_id = $user->id;
            $language->save();
        }

        return \Response::json('success');


    }

    public function saveProjects(Request $request){
        $data = $request->all();

        if(!(array_key_exists('projects',$data))) return \Response::json('error');

        $projectsArray = $data['projects'];

        foreach ($projectsArray as $project){
            $position = $project['position'];
            $webpage = $project['webPage'];
            $description = $project['description'];
            $dateFrom = $project['dateFrom'];
            $dateTo = $project['dateTo'];


            $user = Auth::user();
            if(array_key_exists('id',$project)){
                $experience = Experience::find($project['id']);


                if($project['deleted'] === 'true'){
                    $experience->delete();
                    continue;
                }

            }else{

                if($project['deleted'] === 'true') continue;
                $experience = new Experience();
            }

            $experience->user_id = $user->id;
            $experience->position = $position;
            $experience->webpage = ((substr( $webpage, 0, 7 ) === "http://") || (substr( $webpage, 0, 8 ) === "https://")) ? $webpage : 'http://'.$webpage;
            $experience->info = $description;
            $experience->experience_type_id = 3;
            $experience->from = $dateFrom;
            $experience->to = (trim($dateTo) === '') ? null : $dateTo;
            $experience->save();


        }

        return \Response::json($projectsArray);

    }
}
