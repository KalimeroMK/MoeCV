@extends('defaultLayout.defaultLayout')
@section('head')
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{asset('css/profile/leftSection.css')}}" />
    <link rel="stylesheet" href="{{asset('css/nprogress.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="icon" sizes="192x192" href="{{asset('images/logo.png')}}">

@endsection

@section('navbar')
    <a style="color: white; padding: 1em; font-weight: 700; @if(Config::get('app.locale') == 'en')  text-decoration: underline;@endif" class="pull-right" href="{{route('page',['lang'=>'en'])}}">En</a>
    <a style="color: white; padding: 1em; font-weight: 700; @if(Config::get('app.locale') == 'mk')  text-decoration: underline; @endif" class="pull-right" href="{{route('page',['lang'=>'mk'])}}">Mk</a>
    <div style="clear: both"></div>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="com-md-12">
            <div class="form-container" style="color: black;">
                @include('slider.forms.personalInfoForm')
                @include('slider.forms.workExperience')
                @include('slider.forms.addWorkExperienceForm')
                @include('slider.forms.education')
                @include('slider.forms.addEducationForm')
                @include('slider.forms.topThreeSkills')
                @include('slider.forms.addTopThreeSkills')
                @include('slider.forms.additionalSkills')
                @include('slider.forms.addAdditionalSkills')
                @include('slider.forms.languages')
                @include('slider.forms.addLanguages')
                @include('slider.forms.accomplishmentsAndProjects')
                @include('slider.forms.addAccomplishmentsAndProjectsForm')
                @include('slider.forms.summary')
                @include('slider.forms.socialNetworks')
                @include('slider.forms.availability')

                <button class="btn btn-primary btn-lg col-md-5  "  style="margin: 2em; background-color: white; color: #EB5D5C; border: none; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); outline: none;
" id="saveAllButton">@lang('slider.edit_page_save')</button>
                <a class="btn btn-primary btn-lg col-md-5  "  style="margin: 0 2em 2em 2em; background-color: white; color: #EB5D5C; border: none; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); outline: none;
" href="{{route('show-profile')}}">@lang('slider.edit_page_cancel')</a>
            </div>
        </div>
    </div>
</div>



<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<script src="{{asset('js/slider.js')}}"></script>
{{--<script src="{{asset('js/dropzone.js')}}"></script>--}}
{{--<script src="{{asset('js/profilePage.js')}}"></script>--}}
{{--<script src="{{asset('js/profilePageRightSection.js')}}"></script>--}}
<script src="{{asset('js/sliderDatabase.js')}}"></script>
@endsection
'