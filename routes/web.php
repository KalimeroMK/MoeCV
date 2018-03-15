<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

use App\Users;

Route::get('page/{lang}', function ($lang) {

    App::setLocale($lang);
    session(['my_locale' => $lang]);

    return redirect()->route('slider');
})->name('page');


Route::get('login/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('callback/{provider}', 'Auth\AuthController@handleProviderCallback');



//Route::get('login')->uses('adminController@login')->name('login');
Route::get('skills/json')->uses('GenerateJsonController@skills');
Route::post('/saveBestAdvice')->uses('UserController@saveBestAdvice');
Route::post('/saveTopThreeSkills')->uses('UserController@saveTopSkills');
Route::get('cities/json')->uses('GenerateJsonController@cities');
Route::post('/saveUserInfo')->uses('UserController@saveUserInfo');
Route::post('/saveAdditionalSkills')->uses('UserController@saveAdditionalSkills');
Route::get('/getAdditionalSkills')->uses('UserController@getAdditionalSkills');
Route::get('/getTopThreeSkills')->uses('UserController@getTopThreeSkills');
Route::get('/getBestAdvice')->uses('UserController@getBestAdvice');
Route::get('/getUserInfoData')->uses('UserController@getUserInfoData');
Route::get('/experience_types/json')->uses('GenerateJsonController@experiences');
Route::post('/saveExperienceInfo')->name('save-experience')->uses('UserController@saveExperience');
Route::post('/saveAvailability')->uses('UserController@saveAvailability');
Route::post('/file-upload')->uses('UserController@uploadPhoto');
Route::post('/saveSocialMedia')->uses('UserController@saveSocialMedia');
Route::get('/getSocialMedia')->uses('UserController@getSocialMedia');
Route::post('/saveProfileHeaderText')->uses('UserController@saveProfileHeaderText');
Route::get('/getProfileHeaderText')->uses('UserController@getProfileHeaderText');
Route::get('/deleteProject/{id}')->name('delete-project')->uses('UserController@deleteProject');
Route::post('/saveColor')->uses('UserController@saveColor');
Route::get('/downloadPdf/{id}')->name('download-pdf')->uses('UserController@downloadPdf');

Route::post('/saveScreenDimensions', function (\Illuminate\Http\Request $request) {
    $data = $request->all();
    session(['height' => $data['height']]);
    session(['width' => $data['width']]);

    return Response::json($request->all());
});

Route::post('/saveUserInfoFromEditPage')->uses('EditPageUserController@saveUserInfo');
Route::post('/saveWorkExperience')->uses('EditPageUserController@saveWorkExperience');
Route::post('/saveEducationExperience')->uses('EditPageUserController@saveEducationExperience');
Route::post('/saveLanguage')->uses('EditPageUserController@saveLanguage');
Route::post('/saveProjects')->uses('EditPageUserController@saveProjects');
Route::get('/getAllUserData')->uses('EditPageUserController@getAllUserData');

Route::group(['middleware' => ['language']], function () {
    Route::get('/', function () {
        $user = Users::find(\Auth::id());

        if ($user) {
            return redirect()->route('show-profile');

        }
        return view('defaultLayout.MainPage');

    });

    Route::get('/profile')->name('show-profile')->uses('UserController@showProfile')->middleware('loginMiddleware');
    Route::get('/getSharedProfile')->uses('UserController@getSharedProfile');

    Route::get('/slider', function () {

//    App::setLocale('mk');

        return view('slider.slider');
    })->name('slider')->middleware('loginMiddleware');

    Route::get('/login_page', function () {
        $user = Users::find(\Auth::id());

        if ($user) {
            return redirect()->route('show-profile');

        }
        return view('defaultLayout.LoginPageContent');
    })->name('login-route');

    Route::get('/register_page', function () {
        return view('defaultLayout.RegisterPageContent');

    })->name('register-route');

    Route::get('/publicProfile/{id}/{username}/{isPDF}/{lang}')->uses('UserController@showSharedProfile');

    Route::get('/privacy', function () {
        return view('defaultLayout.privacyInfo');

    })->name('privacy-info');

    Route::get('/about', function () {
        return view('defaultLayout.aboutUs');

    })->name('about');

});

Route::get('/print')->name('print-pdf')->uses('UserController@printPdf');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
