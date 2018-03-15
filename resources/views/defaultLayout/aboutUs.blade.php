@extends('defaultLayout.defaultLayout')
@section('head')

    <style>
        body{
            background-color: white;
            color: #333333;
        }
    </style>
@endsection

@section('content')
    @include('defaultLayout.mainPageNavBar')
    @include('defaultLayout.aboutUsContent')

@endsection


@section('footer')
    {{--<a href="{{route('privacy-info')}}" class="privacy">@lang('mainPage.privacy')</a>--}}
@endsection