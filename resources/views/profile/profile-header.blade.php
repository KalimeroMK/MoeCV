 <div class="container-fluid">

	<div class="row">  

		<div class="col-md-12 p-0">
			<div class="profile-header d-flex-center" style="background-color: {{$user->color}}">
                <i class="fa fa-quote-left fa-5x quote-left" aria-hidden="true"></i>
                <div class="profile-header-text text-center" id="profileHeaderText">
                    @if($user->profile_header_text !== null)
                        {{$user->profile_header_text}}
                    @else
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eligendi expedita harum iure laborum qui! Eius iste iure quas .
                    @endif
                </div>
                <i class="fa fa-quote-right fa-5x quote-right" aria-hidden="true"></i>
                @if($public === false)
                {{--<div class="editHeader d-flex-center pointer" id="editProfileHeader" style="color: {{$user->color}}">Edit</div>--}}
                @endif
            </div>
		</div>	

	</div>

</div>

 @include('profile.modals.profileHeaderModal')

 <script src="{{asset('js/profileHeader.js')}}"></script>