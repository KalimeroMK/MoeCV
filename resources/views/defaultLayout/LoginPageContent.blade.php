@extends('defaultLayout.defaultLayout')
@section('head')
<link rel="stylesheet" type="text/css" href="{{asset('css/LoginRegisterPage.css')}}">
@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>@lang('login.login_register_my_cv_title')</h2>
			<form method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<input type="email" name="email" placeholder="@lang('login.account_register_email')">
				@if ($errors->has('email'))
				<span class="help-block " id="LoginEmailError">
					<strong style="color: white">{{ $errors->first('email') }}</strong>
				</span>
				@endif
				<input type="password" name="password" placeholder="@lang('login.account_register_password')">

				@if ($errors->has('password'))
				<span class="help-block " id="LoginPasswordError">
					<strong style="color: white">{{ $errors->first('password') }}</strong>
				</span>
				@endif

				<button>@lang('login.account_register_login')</button><br><br>
			</form>
			<br>
			<a href="http://moecv.ogledalo.mk/login/facebook" class="fa fa-facebook"></a>
			<a href="http://moecv.ogledalo.mk/login/twitter" class="fa fa-twitter"></a><br>
            <a href="http://moecv.ogledalo.mk/login/google" class="fa fa-google"></a><br>
			<h4>@lang('login.login_register_my_cv_question')</h4> <span><a style="color: white;text-decoration: underline" class="second" href="{{route('register-route')}}">@lang('login.account_register_sign_up_button')</a></span>

		</div>
	</div>
</div>



@endsection

