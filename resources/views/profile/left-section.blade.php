<div class="profile-card-container d-flex-center flex-direction-column">
    <div class="profile-image-container"
         @if($user->profile_photo !== null)
         style="background-image: url('{{asset('storage/'.$user->profile_photo)}}')"
            @endif
    ></div>
    {{--Icons--}}
    <h4>@lang('profile.available_text')</h4>

    <div class="profile-icons-container d-flex-center pointer">
        @if($user->available_full_time !== null)
            <div class="d-flex-center flex-direction-column m-1 icon-container">
                @if($user->available_full_time)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p class="text-center">@lang('profile.profile_page_full_time')</p>

            </div>

            <div class="d-flex-center flex-direction-column m-1 icon-container">
                @if($user->available_part_time)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p class="text-center">@lang('profile.profile_page_part_time')</p>
            </div>

            <div class="d-flex-center flex-direction-column m-1 icon-container">
                @if($user->available_intern)
                    <a href="#"><i class="fa fa-check fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @else
                    <a href="#"><i class="fa fa-close fa-2x" style="color: {{$user->color}}; margin-right: 0"></i></a>
                @endif
                <p class="text-center">@lang('profile.profile_page_freelance')</p>
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

    <div class="profile-skills-container">
        <p class="text-center" style="font-weight: 700;margin-top: 2em">@lang('profile.profile_page_top_three_skills')</p>
        <div class="top-three-skills">

            @foreach($user->topThreeSkills->reverse() as $skill)
                <p style="background-color: {{$user->color}}; color: white">{{$skill->name}}</p>
            @endforeach
            @if(($public === false) && $user->id === Auth::id())
                {{--<p class="pointer" id="addTopThreeSkills" style="background-color: {{$user->color}};color: white">+</p>--}}
            @endif
        </div>
        <p class="text-center" style="font-weight: 700;margin-top: 2em">@lang('profile.profile_page_additional_skills')</p>
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
    {{--Languages--}}
    <div class="experienceContainer" style="width: 100%">
        <div class="d-flex-center experienceContainerIconContainer">
            {{--<img src="{{asset('images/joblogo.png')}}" class="img-responsive experienceContainerIcon" />--}}
            <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: {{$user->color}}; border-radius: 50%; border: 5px solid white"><i class="fa fa-globe fa-2x text-white" style="margin-right: 0"></i></div>
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
@if(($public === false) && $user->id === Auth::id())
    @include('profile.modals.uploadPhotoModal')
    @include('profile.modals.availabilityModal')
    @include('profile.modals.topThreeSkillsModal')
    @include('profile.modals.additionalSkillsModal')
    @include('profile.modals.bestAdviceModal')
    {{--<script src="{{asset('js/dropzone.js')}}"></script>--}}
    <script src="{{asset('js/profilePage.js')}}"></script>
@endif