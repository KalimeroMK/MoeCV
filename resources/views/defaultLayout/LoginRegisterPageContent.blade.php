
<div id="sign" class="container" style="display: none;">
	<div class="row">
		<div class="col-md-12">
			<h2>@lang('login.account_register_create_your_account_title')</h2>
			<form method="POST" action="{{ route('register') }}">
				{{ csrf_field() }}
			<input type="text" name="name" placeholder="@lang('login.account_register_first_name')">
				<input type="text" name="lastName" placeholder="@lang('login.account_register_last_name')">

				<input type="email" name="email" placeholder="@lang('login.account_register_email')">
				@if ($errors->has('email'))
					<span class="help-block" id="registerEmailError">
                                        <strong style="color: white">{{ $errors->first('email') }}</strong>
                                    </span>
				@endif
			<input type="password" name="password" placeholder="@lang('login.account_register_password')">
				@if ($errors->has('password'))
					<span class="help-block " id="registerPasswordError">
                                        <strong style="color: white">{{ $errors->first('password') }}</strong>
                                    </span>
				@endif

						<input id="password-confirm" type="password" name="password_confirmation" required placeholder="@lang('login.account_register_confirm_password')">


			<button>@lang('login.account_register_sign_up_button')</button><br><br>
			</form>
			<h4>@lang('login.account_register_question')</h4> <span><a class="login" href="{{route('login-route')}}">@lang('login.account_register_login')</a></span>
		</div>
	</div>
</div>







<!-- <script type="text/javascript">
$(document).ready(function () {


    $(".login").click(function () {
        $("#sign").hide();
        $("#login").show();
    });

    $(".second").click(function () {
        $("#login").hide();
        $("#sign").show();
    });
});

</script> -->


