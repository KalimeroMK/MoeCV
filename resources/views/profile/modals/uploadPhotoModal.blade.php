<div class="modal fade" id="uploadPhotoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('profile.profile_page_profile_picture')</h4>
            </div>
            <div class="modal-body">
                @include('profile.modals.uploadPhotoModalBody')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('profile.profile_page_close')</button>
                <button type="button" class="btn btn-primary" id="savePhoto">@lang('profile.profile_page_save_changes')</button>
            </div>
        </div>
    </div>
</div>