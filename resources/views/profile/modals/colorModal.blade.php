<div class="modal fade" id="colorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                {{--<h4 class="modal-title" id="myModalLabel">@lang('profile.profile_page_profile_picture')</h4>--}}
            </div>
            <div class="modal-body">
                <div class="colorsContainer d-flex-center" style="flex-wrap: wrap">
                    @foreach($colors as $color)
                    <div class="colorCircle d-flex-center" data-color="{{$color}}" style="height: 5em; width: 5em; border-radius: 50%; background-color: {{$color}} ; margin: 1em">@if($user->color === $color)<i style="color: white" class="fa fa-check fa-lg"></i>@endif</div>
                    @endforeach

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">@lang('profile.profile_page_close')</button>
                {{--<button type="button" class="btn btn-primary" id="savePhoto">@lang('profile.profile_page_save_changes')</button>--}}
            </div>
        </div>
    </div>
</div>