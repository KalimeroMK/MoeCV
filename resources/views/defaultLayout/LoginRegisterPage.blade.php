@extends('defaultLayout.defaultLayout')
	@section('head')
		<link rel="stylesheet" type="text/css" href="{{asset('css/LoginRegisterPage.css')}}">
	@endsection

	@section('content')

		@include('defaultLayout.RegisterPageContent')
		@include('defaultLayout.LoginPageContent')
		
	@endsection