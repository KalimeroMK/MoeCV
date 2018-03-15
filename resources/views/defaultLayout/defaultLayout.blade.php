<!DOCTYPE html>
<html lang="eng"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#">
<head>
    {{--<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="theme-color" content="#eb5d5c">
    <link rel="icon" sizes="192x192" href="{{asset('images/logo.png')}}">
    <title>Moe CV | Креирај онлајн портфолио</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS and Java -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{asset('css/bootstrap/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Latest compiled and minified JavaScript -->
    <!-- font css -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- end font css -->
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- end main css -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Custam java -->
    <script src="{{asset('EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js')}}"></script>
    <!-- end Custam java -->
    <!-- Seo optimizacija-->
    <meta property="article:tag" content="CV, Curriculum Vitae, portfolio, online, create, Profesional"/>
    <meta name="description"
          content="МоеCV е бесплатна алатка за креирање на онлајн портфолио, изработено од учесниците на Академијата за програмирање, за заедницата.Твоето професионално онлајн портфолио ќе биде готово за неколку минути">
    <meta name="keywords"
          content="CV, Curriculum Vitae, portfolio, online, create, Profesional, портфолио, онлајн, креирај,академија,учесници, brainster"/>
    <meta name="author" content="Zoran Shefot Bogoevski">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Moe CV">
    <meta itemprop="description"
          content="МоеCV е бесплатна алатка за креирање на онлајн портфолио од учесниците на Академијата за програмирање, за заедницата.Твоето професионално онлајн портфолио ќе биде готово за неколку минути">
    <meta itemprop="image" content="{{asset('images/free.png')}}">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@zaebalovek">
    <meta name="twitter:title" content="Moe CV">
    <meta name="twitter:description"
          content="МоеCV е бесплатна алатка за креирање на онлајн портфолио од учесниците на Академијата за програмирање, за заедницата.Твоето професионално онлајн портфолио ќе биде готово за неколку минути">
    <meta name="twitter:creator" content="@zaebalovek">
    <meta name="twitter:image" content="{{asset('images/free.png')}}">
    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US"/>
    <meta property="og:title" content="Moe CV"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content="{{asset('images/free.png')}}"/>
    <meta property="og:description"
          content="МоеCV е бесплатна алатка за креирање на онлајн портфолио од учесниците на Академијата за програмирање, за заедницата.Твоето професионално онлајн портфолио ќе биде готово за неколку минути"/>
    <meta property="og:site_name" content="Moe CV"/>
    @section('head')
    @show
</head>
<body>
@section('navbar')
@show
@section('content')
@show
@section('footer')
@show
</body>
</html>
