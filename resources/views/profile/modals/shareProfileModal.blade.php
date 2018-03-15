<div class="modal fade" id="shareProfileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('profile.profile_page_share_your_cv')</h4>
            </div>
            <div class="modal-body">
                @include('profile.modals.shareProfileModalBody')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('profile.profile_page_close')</button>
            </div>
        </div>
    </div>
</div>