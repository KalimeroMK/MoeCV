<div class="infoContainer" style="margin-top: 2em">

    <h2 class="text-uppercase p-1">{{$user->first_name." ".$user->last_name}}</h2>
    <i  class="fa fa-pencil fa-2x pointer " id="editUserInfo" aria-hidden="true"></i>

        <h4>{{$user->job}}</h4>
        <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i><span>@if($user->city_id !==   null){{$user->city->name}}@endif</span></div>
        <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i><span>{{$user->degree}}</span></div>
        <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-suitcase fa-2x" aria-hidden="true"></i><span>{{$user->job}}</span></div>
        <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i><span>{{$user->email}}</span></div>
        <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-phone fa-2x" aria-hidden="true"></i><span>{{$user->phone}}</span></div>
        {{--<div class="btn btn-default messageButton"><i class="fa fa-envelope" aria-hidden="true"></i>--}}
            {{--Message</div>--}}


</div>
<h2 class="text-center">@lang('profile.profile_page_work_experience')</h2>
@foreach($currentWorkExperience as $experience)
    <div class="experienceContainer">
        <div class="d-flex-center experienceContainerIconContainer">
            {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
            <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-suitcase fa-2x text-white" style="margin-right: 0"></i></div>
        </div>
        <h4 class="text-center text-muted">{{$experience->from}} - present</h4>
        <h4 class="text-center m-top-bottom-2 experienceType">{{$experience->position}}  @lang('profile.profile_page_at') <a href="{{$experience->webpage}}" style="color: #333333; font-weight: 700;text-decoration: underline ">{{$experience->company}}</a> </h4>
        <p class="text-center m-top-bottom-2">{{$experience->info}}</p>
    </div>
@endforeach
@foreach($experiences as $experience)


<div class="experienceContainer">
    <div class="d-flex-center experienceContainerIconContainer">
        {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
        <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-suitcase fa-2x text-white" style="margin-right: 0"></i></div>
    </div>
    <h4 class="text-center text-muted">{{$experience->from}} - {{$experience->to}}</h4>
    <h4 class="text-center m-top-bottom-2 experienceType">{{$experience->position}}  @lang('profile.profile_page_at') <a href="{{$experience->webpage}}" style="color: #333333; font-weight: 700;text-decoration: underline">{{$experience->company}}</a>  </h4>
    <p class="text-center m-top-bottom-2">{{$experience->info}}</p>
</div>

@endforeach
<h2 class="text-center">@lang('profile.profile_page_education')</h2>

@foreach($educationExperience as $experience)

    <div class="experienceContainer">
        <div class="d-flex-center experienceContainerIconContainer">
            {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
            <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-graduation-cap fa-2x text-white" style="margin-right: 0"></i></div>
        </div>
        <h4 class="text-center text-muted">{{$experience->from}} - {{$experience->to}}</h4>
        <h4 class="text-center m-top-bottom-2 experienceType">{{$experience->position}}  @lang('profile.profile_page_at') <a href="{{$experience->webpage}}" style="color: #333333; font-weight: 700; text-decoration: underline">{{$experience->company}}</a>  </h4>
        <p class="text-center m-top-bottom-2">{{$experience->info}}</p>
    </div>

@endforeach

<h2 class="text-center">@lang('profile.profile_page_projects')</h2>

@foreach($projects as $experience)

    <div class="experienceContainer">
        <div class="d-flex-center experienceContainerIconContainer">
            {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
            <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-laptop fa-2x text-white" style="margin-right: 0"></i></div>
        </div>
        <h4 class="text-center text-muted">{{$experience->from}} - {{$experience->to}}</h4>
        <h4 class="text-center m-top-bottom-2 experienceType"><a href="{{$experience->webpage}}" style="color: #333333; font-weight: 700; text-decoration: underline">{{$experience->position}}</a></h4>

        <p class="text-center m-top-bottom-2">{{$experience->info}}</p>
    </div>

@endforeach
{{--@if(($public === false) && $user->id === Auth::id())--}}
    {{--<div class="addExperience alert alert-warning pointer alert-center" style="background-color: {{$user->color}}; color: white">Add experience</div>--}}
    {{--<div class="monster"></div>--}}

{{--@endif--}}


@if(($public === false) && $user->id === Auth::id())
    @include('profile.modals.userInfoModal')
    @include('profile.modals.colorModal')
    @include('profile.modals.experienceModal')
    @include('profile.modals.shareProfileModal')
<script src="{{asset('js/profilePageRightSection.js')}}"></script>

@endif