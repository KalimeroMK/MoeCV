<div class="profile-card-container">
    <div class="profile-image-container col-md-offset-3"
         @if($user->profile_photo !== null)
         style="background-image: url('{{asset('storage/'.$user->profile_photo)}}'); background-position: center; background-repeat: no-repeat"
            @endif
    ></div>
    {{--Icons--}}
    <div class="profile-icons-container pointer">
        @if($user->available_full_time !== null)
            <div class="col-md-4 icon-container">
                @if($user->available_full_time)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p>@lang('profile.profile_page_full_time')</p>

            </div>

            <div class="col-md-4 icon-container">
                @if($user->available_part_time)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p>@lang('profile.profile_page_part_time')</p>
            </div>

            <div class="col-md-4 icon-container">
                @if($user->available_intern)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p>@lang('profile.profile_page_freelance')</p>
            </div>
            {{--@if(($public === false) && $user->id === Auth::id())--}}
            {{--<div class="d-flex-center flex-direction-column m-1 edit-icon-container"--}}
            {{--style="background-color: {{$user->color}}">--}}
            {{--<p>Edit</p>--}}
            {{--</div>--}}
            {{--@endif--}}
        @else
            {{--@if(($public === false) && $user->id === Auth::id())--}}
            {{--<div class="alert alert-warning pointer availability_button" id="availability">Tell us about your--}}
            {{--availability--}}
            {{--</div>--}}
            {{--@endif--}}
        @endif


    </div>
    {{--Skills--}}
    <p style="text-align: center;margin-top: 8em">@lang('profile.profile_page_top_three_skills')</p>

    <div class="profile-skills-container">
        <div class="top-three-skills">

            @foreach($user->topThreeSkills->reverse() as $skill)
                <p style="background-color: {{$user->color}}; color: white">{{$skill->name}}</p>
            @endforeach
            @if(($public === false) && $user->id === Auth::id())
                {{--<p class="pointer" id="addTopThreeSkills" style="background-color: {{$user->color}};color: white">+</p>--}}
            @endif
        </div>
        <p style="text-align: center">@lang('profile.profile_page_additional_skills')</p>

        <div class="additional-skills">
            @foreach($user->skills->reverse() as $skill)
                <p style="background-color: {{$user->color}}; color: white">{{$skill->name}}</p>
            @endforeach
            @if(($public === false) && $user->id === Auth::id())
                {{--<p class="pointer" id="addAdditionalSkills" style="background-color: {{$user->color}}; color: white">--}}
                {{--+</p>--}}
            @endif

        </div>
    </div>
    <div class="experienceContainer" style="width: 100%">
        <div class="experienceContainerIconContainer" style="text-align: -webkit-center">
            {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
            <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-globe fa-2x text-white" style="margin-top: 1em; margin-left: 0.9em"></i></div>
        </div>
        <h4 class="text-center text-muted">@lang('profile.profile_page_language')</h4>
        @foreach($user->languages as $language)
            <h4>{{$language->name}}</h4>
            <p class="text-muted" style="padding-bottom: 2em">{{$language->level}}</p>
        @endforeach
    </div>
    {{--Social icons--}}
    <div class="social-icons-container d-flex-start flex-direction-column pointer"
         @if($user->id === Auth::id())id="socialMedia"@endif>
        @if(count($user->socialNetworks) > 0)

            @foreach($user->socialNetworks as $socialNetwork)
                @if(trim($socialNetwork->pivot->url) !== '' )
                    <a href="{{$socialNetwork->pivot->url}}"><i class="fa fa-{{$socialNetwork->name}}"
                                                                style="background-color: {{$user->color}}"
                                                                aria-hidden="true"></i><span
                                style="margin-left: 2em; color: {{$user->color}}">{{$socialNetwork->pivot->url}}</span></a>
                @endif
            @endforeach
        @else
            @if($user->id === Auth::id())
                <a class="alert alert-warning social_media_button"><p class="pointer" id="addSocialMedia">Add your
                        social media</p></a>
            @endif
        @endif
    </div>
    {{--Text--}}
    {{--<div style="background-color: {{$user->color}}" class="profile-text-container">--}}
    {{--<div class="question-mark-container d-flex-center">--}}
    {{--<div class="question-mark"></div>--}}

    {{--</div>--}}
    {{--<h4 class="pointer" id="bestAdvice">What's the best advice you've heard recently?</h4>--}}
    {{--@if($user->short_bio !== null)--}}
    {{--<p>{{$user->short_bio}}</p>--}}
    {{--@endif--}}

    {{--</div>--}}
</div>

{{--<!-- Button trigger modal -->--}}
{{--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">--}}
{{--Launch demo modal--}}
{{--</button>--}}

<!-- Modal -->
