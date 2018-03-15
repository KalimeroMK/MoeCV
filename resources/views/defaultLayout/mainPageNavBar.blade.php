
<nav class="navbar navbar-inverse" style="background-color: #EB5D5C; border-radius: 0; border: none; margin-bottom: 2em">


    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand text-white" href="{{url('/')}}" style="color: white;font-weight: 700">@lang('mainPage.main_page_app_name')</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('about')}}" style="color: white;font-weight: 700">@lang('mainPage.main_page_about_us')</a></li>
                <li><a href="https://blog.brainster.co" style="color: white;font-weight: 700">@lang('mainPage.main_page_blogs')</a></li>
                <li><a href="https://brainster.co/courses#!/grid/infinite/throttle:30/threshold:30/" style="color: white;font-weight: 700">@lang('mainPage.main_page_courses')</a></li>
                <li><a href="http://codepreneurs.co/" style="color: white;font-weight: 700">@lang('mainPage.main_page_academy')</a></li>
                <li><a href="http://marketpreneurs.co/" style="color: white;font-weight: 700">@lang('mainPage.main_page_academy_marketing')</a></li>

            </ul>
        </div>
    </div>
</nav>
