@extends('defaultLayout.defaultLayout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pageEnMk.css')}}">
@endsection

@section('content')

    <ul class=" list list-inline list-unstyled pull-right">
        @auth
            <li><a href="{{route('show-profile')}}">@lang('mainPage.profile')</a></li>

            @else
                <li><a href="{{route('login')}}">@lang('mainPage.login')</a></li>
                <li><a href="{{route('register')}}">@lang('mainPage.signup')</a></li>
                @endauth
    </ul>

    <img src="https://www.cvstandout.com/wp-content/uploads/2016/12/Crno-logo-Web.png">

    <div class="text">
        <h2>@lang('mainPage.text')</h2>
    </div>

@endsection






