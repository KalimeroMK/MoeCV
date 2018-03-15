<a  href="{{route('download-pdf',['id'=>$user->id])}}"><div style="background-color: #EB5D5C; padding: 2em; height: 2em;width: 2em; border-radius: 50%; position: fixed; right: 2em; bottom: 2em" class="d-flex-center pointer">
    <i class="fa fa-download text-white"></i>
</div></a>

<p style="position: fixed; right: 3em; bottom: 15em; color: grey">@lang('profile.profile_page_color')</p>

<div id="colorPicker" style="position: fixed; right: 3em; bottom: 12em">
    <a class="color"><div style="background-color: {{$user->color}}" class="colorInner"></div></a>

</div>

<div style="background-color: #EB5D5C; padding: 2em; height: 2em;width: 2em; border-radius: 50%; position: fixed; right: 2em; bottom: 8em" class="d-flex-center pointer" id="shareButton">
        <i class="fa fa-share text-white"></i>
</div>