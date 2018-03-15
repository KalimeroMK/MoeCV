<div class="container-fluid">

    <div class="row">

        <div class="col-md-12 p-0">
            <div class="profile-header" style="background-color: {{$user->color}}; display: grid;padding: 2em;" >
                {{--<i class="fa fa-quote-left fa-5x quote-left" aria-hidden="true" style="margin-right: auto"></i>--}}
                <div class="profile-header-text text-center" id="profileHeaderText" style="margin: auto">
                    @if($user->profile_header_text !== null)
                        {{$user->profile_header_text}}
                    @else
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eligendi expedita harum iure laborum qui! Eius iste iure quas .
                    @endif
                </div>

            </div>
        </div>

    </div>

</div>

{{--@include('profile.modals.profileHeaderModal')--}}

{{--<script src="{{asset('js/profileHeader.js')}}"></script>--}}