
@extends('defaultLayout.defaultLayout')
@section('head')
    <link rel="stylesheet" href="{{asset('css/profile/leftSection.css')}}" />
    <link rel="stylesheet" href="{{asset('css/profile/rightSection.css')}}" />
    <link rel="stylesheet" href="{{asset('css/profile/header.css')}}" />

    @if(($public === false) && $user->id === Auth::id())
        <link rel="stylesheet" href="{{asset('css/profile/leftSectionAuth.css')}}" />
        {{--<link rel="stylesheet" href="{{asset('css/profile/rightSectionAuth.css')}}" />--}}
        {{--<link rel="stylesheet" href="{{asset('css/profile/headerAuth.css')}}" />--}}
    @endif

    <link rel="stylesheet" href="{{asset('EasyAutocomplete-1.3.5/easy-autocomplete.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{asset('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js')}}"></script>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">

    <script src="{{asset('js/jquery.tinycolorpicker.js')}}"></script>


@endsection

@section('navbar')
    @if($public === false)
        @include('navbar')
    @endif
@endsection
@section('content')
    <div id="pdfContent">
        {{--//include header--}}


        @include('profile.profileHeaderPdf')

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-1">
                    @include('profile.left-sectionPdf')
                </div>

                <div class="col-md-6">


                    @include('profile.rightSectionPdf')

                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @if($public === false)
        @include('profile.downloadpdf')
    @endif
@endsection
