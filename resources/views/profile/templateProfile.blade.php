
@extends('defaultLayout.defaultLayout')
    @section('head')
    <link rel="stylesheet" href="{{asset('css/profile/leftSection.css')}}" />
    <link rel="stylesheet" href="{{asset('css/profile/rightSection.css')}}" />
    <link rel="stylesheet" href="{{asset('css/profile/header.css')}}" />
    <meta name="theme-color" content="{{$user->color}}">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    @if(($public === false) && $user->id === Auth::id())
        <link rel="stylesheet" href="{{asset('css/profile/leftSectionAuth.css')}}" />
        {{--<link rel="stylesheet" href="{{asset('css/profile/rightSectionAuth.css')}}" />--}}
        {{--<link rel="stylesheet" href="{{asset('css/profile/headerAuth.css')}}" />--}}
    @endif

    <link rel="stylesheet" href="{{asset('EasyAutocomplete-1.3.5/easy-autocomplete.css')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{asset('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js')}}"></script>


    <script src="{{asset('js/jquery.tinycolorpicker.js')}}"></script>


@endsection

@section('navbar')
    @if($public === false)
    @include('navbar')
    @else
        <div class="d-flex-center">
            <h4>Креирано со</h4>
            <a style="margin-left: 1em; font-weight: 700" href="http://moecv.mk"> Moe CV</a>
        </div>
    @endif
@endsection
@section('content')
<div id="pdfContent">
    {{--//include header--}}


    @include('profile.profile-header')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                @include('profile.left-section')
            </div>

            <div class="col-md-6">


                @include('profile.rightSection')

            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
    @if($public === false)
    @include('profile.downloadpdf')
    @endif
    <script>
        var height = $( document ).height();
        var width = $( document ).width();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveScreenDimensions',{height:height,width:width},function (data) {
            console.log(data);
        });


    </script>
@endsection
