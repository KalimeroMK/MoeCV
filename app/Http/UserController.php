<?php

namespace App\Http\Controllers;

use App\City;
use App\Experience;
use App\ExperienceType;
use App\Project;
use App\Skill;
use App\SocialNetwork;
use App\Users;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Dompdf\Dompdf;
use FontLib\Table\Type\name;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{

    public function showProfile(){
        $user = Users::with(['skills','city','topThreeSkills','experiences','socialNetworks','languages'])->where('id',Auth::id())->first();

        $experience= Experience::with(['experienceType','projects'])->where('user_id',Auth::id());
        $workExperience = $experience->where('experience_type_id',2)->where('to','not like','')->orderByDesc('to')->get();

        $currentExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',Auth::id());
        $currentWorkExperience = $currentExperienceModel->where('experience_type_id',2)->whereNull('to')->get();

        $educationExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',Auth::id());
        $educationExperience = $educationExperienceModel->where('experience_type_id',1)->orderByDesc('to')->get();

        $projectsExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',Auth::id());
        $projectsExperience = $projectsExperienceModel->where('experience_type_id',3)->orderByDesc('to')->get();

        $colors = ['#ef5350','#ec407a','#ab47bc','#7e57c2','#5c6bc0','#304ffe','#42a5f5','#29b6f6','#26c6da','#26a69a','#66bb6a','#9ccc65','#d4e157','#ffee58','#900020','#ffa726','#ff7043','#bdbdbd','#78909c','#fbd132','#000000','#eeac99','#4f3222','#454140','#563f46'];

        return view('profile.templateProfile')->with(['user'=>$user,'experiences'=>$workExperience,'currentWorkExperience'=>$currentWorkExperience,'educationExperience'=>$educationExperience,'projects'=>$projectsExperience,'colors'=>$colors,'public'=>false]);
    }

    public function saveBestAdvice(Request $request){

        $data = $request->all();

        $user = Users::find(\Auth::id());
        $user->short_bio = $data['text'];
        $user->save();


    }

    public function getBestAdvice(){
        $user = Users::find(\Auth::id());
        $bestAdvice = $user->short_bio;

        return \Response::json($bestAdvice);
    }

    public function saveTopSkills(Request $request){
        $data = $request->all();
        if(!(array_key_exists('skills',$data))){
            $user = Users::find(Auth::id());
            $user->topThreeSkills()->sync([]);
            return \Response::json('deleted');
        }
        $skills = $data['skills'];



        $user = Users::find(Auth::id());
        $skillModelId = [];

        foreach ($skills as $key => $skill) {
            $skillModel = Skill::where('name', $skill)->first();
            if($skillModel === null){
                $skillModel = new Skill();
                $skillModel->name = $skill;
                $skillModel->custom = true;
                $skillModel->save();
                $skillModel = Skill::where('name', $skill)->first();

            }

            array_push($skillModelId,$skillModel->id);
        }
        $user->topThreeSkills()->sync([]);
        $user->topThreeSkills()->sync($skillModelId);



        return \Response::json('hi');
    }

    public function getTopThreeSkills(){

        $user = Users::with(['topThreeSkills'])->where('id',\Auth::id())->first();
        $skills = $user->topThreeSkills;
        return \Response::json($skills);

    }

    public function saveAdditionalSkills(Request $request){
        $data = $request->all();

        if(count($data) === 0){
            $user = Users::find(Auth::id());
            $user->skills()->sync([]);
            return \Response::json('deleted all skills');
        }
        $skills = $data['skills'];


        $user = Users::find(Auth::id());

        $skillModelId = [];

        foreach ($skills as $key => $skill) {

            $skillModel = Skill::where('name', $skill)->first();
            if($skillModel === null){
                $skillModel = new Skill();
                $skillModel->name = $skill;
                $skillModel->custom = true;
                $skillModel->save();
                $skillModel = Skill::where('name', $skill)->first();

            }

            array_push($skillModelId,$skillModel->id);
        }

        $user->skills()->sync($skillModelId);



        return \Response::json('hi');
    }

    public function getAdditionalSkills(){
        $user = Users::with(['skills'])->where('id',\Auth::id())->first();
        $skills = $user->skills;
        return \Response::json($skills);

    }

    public function saveUserInfo(Request $request){
        $data = $request->all();
        $cityId = $data['cityId'];
        $degree = $data['degree'];
        $job = $data['job'];

        $user = Users::find(Auth::id());
        $city = City::find($cityId);

        $user->city()->associate($city);
        $user->degree = $degree;
        $user->job = $job;
        $user->save();

        return \Response::json($request->all());
    }

    public function getUserInfoData(){
        $user = Users::with('city')->where('id',Auth::id())->first();

        $userData = ['cityId'=>$user->city_id, 'degree' => $user->degree, 'job' => $user->job, 'user'=>$user];

        return \Response::json($userData);

    }


    public function saveExperience(Request $request){
        $data = $request->all();


        $company = $data['company'];
        $experienceType = $data['experienceType'];
        $projectName = $data['projectName'];
        $projectInfo = $data['projectInfo'];
        $experienceId = $data['experienceId'];
        if(array_key_exists('projectIds',$data)) $projectIds = explode(',',$data['projectIds']);
//        return  \Response::json($projectName);
        $user = Auth::user();
        $experienceTypeModel = ExperienceType::where('name',$experienceType)->first();
        if(count($experienceTypeModel) === 0) return \Response::json("Error");
        $experience = Experience::find($experienceId);
        if($experience == null){
            $experience = new Experience();
        }
        $experience->users()->associate($user);
        $experience->company = $company;
        $experience->experienceType()->associate($experienceTypeModel);

        $experience->save();


        for ($i=0; $i<count($projectName);$i++){
            if(isset($projectIds) && array_key_exists($i,$projectIds)){
                $project = Project::find($projectIds[$i]);
            }else{
                $project = new Project();

            }
            if($project == null){
                $project = new Project();
            }
            $project->name = $projectName[$i];
            $project->info = $projectInfo[$i];
            $project->experience()->associate($experience);
            $project->save();
        }



        return \Response::json($data);
    }


    public function saveAvailability(Request $request){
        $data = $request->all();



        $fullTime = $data['fullTime'];
        $partTime = $data['partTime'];
        $freeLance = $data['freelance'];

        $user = Users::find(Auth::id());
        $user->available_full_time = $fullTime;
        $user->available_part_time = $partTime;
        $user->available_intern = $freeLance;
        try{
            $user->save();
        }catch (QueryException $queryException){
            return \Response::json($queryException);

        }
        return \Response::json($data);

    }

    public function showCandidate($id){
        $user = Users::with(['skills','city','topThreeSkills','experiences'])->where('id',$id)->first();

        $experience= Experience::with(['experienceType','projects'])->where('user_id',$id)->get();





        return view('profile.templateProfile')->with(['user'=>$user,'experiences'=>$experience]);
    }


    public function uploadPhoto(Request $request){

        if($request->file('file') == null) return redirect()->route('show-profile');
//        ini_set('upload_max_filesize', '10M');
        ini_set('post_max_size', '10M');
        $extension = $request->file('file')->clientExtension();
        $path = $request->file('file')->storeAs('public/profile', 'profile'.$request->user()->id.'.'.$extension);

        $user = Users::find(Auth::id());
        $user->profile_photo = explode('public/',$path)[1];
        $user->save();


         clearstatcache();
        return redirect()->route('show-profile');
    }


    public function saveSocialMedia(Request $request){
        $data = $request->all();
        $facebook = $data['facebook'];
        $twitter = $data['twitter'];
        $linkedin = $data['linkedin'];
        $dribble = $data['dribble'];
        $github = $data['github'];

        $user = Users::find(Auth::id());

        $facebookModel = SocialNetwork::where('name','facebook')->first();
        $twitterModel = SocialNetwork::where('name','twitter')->first();
        $linkedinModel = SocialNetwork::where('name','linkedin')->first();
        $dribbleModel = SocialNetwork::where('name','dribbble')->first();
        $githubModel = SocialNetwork::where('name','github')->first();

        $socialNetworksId = [
            $facebookModel->id => ['url'=>$facebook],
            $twitterModel->id => ['url'=>$twitter],
            $linkedinModel->id => ['url'=>$linkedin],
            $dribbleModel->id => ['url'=>$dribble],
            $githubModel->id => ['url'=>$github]
        ];

        $user->socialNetworks()->sync($socialNetworksId);


        return \Response::json('hi');

    }


    public function getSocialMedia(){
        $user = Users::with(['socialNetworks'])->where('id',\Auth::id())->first();
        return \Response::json($user);
    }


    public function saveProfileHeaderText(Request $request){
        $data = $request->all();
        $text = $data['text'];
//        return \Response::json($data);
        $user = Users::find(Auth::id());
        $user->profile_header_text = $text;
        $user->save();
    }

    public function getProfileHeaderText(){
        $user = Users::find(Auth::id());
        $text = $user->profile_header_text;

        return \Response::json($text);
    }


    public function deleteProject($id){

        $project = Project::find($id);



        $project->delete();

        return redirect()->route('show-profile');
    }


    public function saveColor(Request $request){
        $data = $request->all();

        $color = $data['color'];

        $user = Users::find(Auth::id());

        $user->color = $color;

        $user->save();
    }

    public function showSharedProfile($id,$username,$isPdf,$lang){

        \App::setLocale($lang);
        $id = Crypt::decryptString($id);

        $user = Users::with(['skills','city','topThreeSkills','experiences','socialNetworks','languages'])->where('id',$id)->first();

        $experience= Experience::with(['experienceType','projects'])->where('user_id',$id);
        $workExperience = $experience->where('experience_type_id',2)->where('to','not like','')->orderByDesc('to')->get();

        $currentExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',$id);
        $currentWorkExperience = $currentExperienceModel->where('experience_type_id',2)->whereNull('to')->get();

        $educationExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',$id);
        $educationExperience = $educationExperienceModel->where('experience_type_id',1)->orderByDesc('to')->get();

        $projectsExperienceModel = Experience::with(['experienceType','projects'])->where('user_id',$id);
        $projectsExperience = $projectsExperienceModel->where('experience_type_id',3)->orderByDesc('to')->get();

        $colors = ['#ef5350','#ec407a','#ab47bc','#7e57c2','#5c6bc0','#304ffe','#42a5f5','#29b6f6','#26c6da','#26a69a','#66bb6a','#9ccc65','#d4e157','#ffee58','#ffca28','#ffa726','#ff7043','#bdbdbd','#78909c','#fbd132'];




        if($isPdf === '1'){
            return view('profile.templatePdfProfile')->with(['user'=>$user,'experiences'=>$workExperience,'currentWorkExperience'=>$currentWorkExperience,'educationExperience'=>$educationExperience,'projects'=>$projectsExperience,'public'=>true]);
        }else{
            return view('profile.templateProfile')->with(['user'=>$user,'experiences'=>$workExperience,'currentWorkExperience'=>$currentWorkExperience,'educationExperience'=>$educationExperience,'projects'=>$projectsExperience,'colors'=>$colors,'public'=>true]);
        }


    }


    public function getSharedProfile($isPdf = false){
        $user = Auth::user();
        $encryptedId = Crypt::encryptString($user->id);

        if($isPdf){
            $username = "/publicProfile/" . $encryptedId . "/" . $user->first_name . $user->last_name."pdf"."/"."1";
            return $username;

        }else {
            $username = "/publicProfile/" . $encryptedId . "/" . $user->first_name . $user->last_name."/"."0";
        }
        return \Request::getSchemeAndHttpHost().$username;
    }

    public function downloadPdf($id){
        $sharedProfile = $this->getSharedProfile(true);
        $sharedProfile = 'http://moecv.mk'.$sharedProfile."/mk";
//        $sharedProfile = 'http://moecv.mk/';
//        $sharedProfile = 'http://moecv.mk/publicProfile/1/BranePetkoski/1/en';
//        return PDF::loadFile($sharedProfile)->inline('github.pdf');
//        $html = file_get_contents($sharedProfile);
//        $dompdf = new Dompdf();
//        $dompdf->loadHtml($html);
//        $dompdf->render();
//        return $dompdf->stream("sample.pdf");
        if(session('width','1920') < 1351){
            return SnappyPdf::loadFile($sharedProfile)->setOptions(['encoding'=> 'utf-8','disable-smart-shrinking'=>false,'page-width'=>'1351px','page-height'=>session('height','1080').'px'])->stream('download.pdf');
        }
        return SnappyPdf::loadFile($sharedProfile)->setOptions(['encoding'=> 'utf-8','disable-smart-shrinking'=>false,'page-width'=>session('width','1920').'px','page-height'=>session('height','1080').'px'])->stream('download.pdf');


    }


}

