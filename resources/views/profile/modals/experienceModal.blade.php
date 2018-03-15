<div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-id=null>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tell us about your experience</h4>
            </div>
            <div class="modal-body">
                @include('profile.modals.experienceModalBody')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveExperienceInfo">Save changes</button>
            </div>
        </div>
    </div>
</div>