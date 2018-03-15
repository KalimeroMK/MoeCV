@extends('defaultLayout.defaultLayout')
@section('head')
@endsection
@section('content')
    @include('defaultLayout.mainPageNavBar')
    @include('defaultLayout.MainPageContent')
@endsection
@section('footer')
    <div class="col-md-12 mainPageFooter">
        <h3 class="col-md-9 pull-left"
            style="padding: 1em;padding-bottom: 0.5em; font-size: 16px">@lang('mainPage.footer')<a
                    href="http://codepreneurs.co/" style="color: white; text-decoration: underline; font-weight: 700">Академијата
                за програмирање на Brainster</a></h3>
        <h4><a href="{{route('privacy-info')}}" class="col-md-3 pull-right"
               style="color: white;padding: 2%; padding-bottom: 0.5em; text-decoration: underline; font-size: 14px">@lang('mainPage.privacy')</a>
        </h4>
    </div>
@endsection