
<nav class="navbar navbar-inverse" style="background-color: {{$user->color}}; border-radius: 0; border: none; margin-bottom: 0">


    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-white" href="#" style="color: white;font-weight: 700">@lang('mainPage.main_page_app_name')</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('slider')}}" style="color: white;font-weight: 700">@lang('profile.profile_page_edit_button')</a></li>
            <li>
                <a href="{{ route('logout') }}" style="color: white;font-weight: 700"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    @lang('profile.profile_page_logout_button')
                </a>



                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
        </div>
    </div>
</nav>
