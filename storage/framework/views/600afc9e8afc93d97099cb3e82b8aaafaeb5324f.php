 <div class="col-md-5 card" id="addAccomplishmentsAndProjectsForm" data-isedit="0">
    <div>
        <h4><?php echo app('translator')->getFromJson('slider.edit_page_project_form_title'); ?></h4>
        <div class="form-group form-inline">
            <label for="projectName"><?php echo app('translator')->getFromJson('slider.edit_page_project_form_project_name'); ?></label>
            <input type="text" class="form-control" id="projectName" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="projectUrl"><?php echo app('translator')->getFromJson('slider.edit_page_project_form_project url'); ?></label>
            <input type="text" class="form-control" id="projectUrl" maxlength="255" style="width: 100%">
        </div>

        <div class="form-group form-inline">
            <label for="projectDescribe"><?php echo app('translator')->getFromJson('slider.edit_page_project_form_project_description'); ?></label>
            <textarea type="text" class="form-control" id="projectDescription" cols="30" rows="5" maxlength="3000" style="width: 100%" ></textarea>
        </div>

        <div class="form-group form-inline date-container" style=" flex-direction: row">
            <label for="projectFrom"><?php echo app('translator')->getFromJson('slider.edit_page_date_of_realisation_month'); ?></label>
            <input maxlength="20" style="width: 6em" type="text" class="form-control" id="projectDateFrom">
            <label for="projectTo" style="margin-left: 2em"><?php echo app('translator')->getFromJson('slider.edit_page_date_of_realisation_year'); ?></label>
            <input maxlength="4" style="width: 6em" type="number" class="form-control" id="projectDateTo">
        </div>

        <button class="btn btn-primary pull-right" id="saveAccomplishmentsAndProjectsButton"><?php echo app('translator')->getFromJson('slider.edit_page_save'); ?></button>
        <button  class="btn btn-default pull-right closeForm" style="margin-right: 1em" ><?php echo app('translator')->getFromJson('slider.edit_page_close'); ?></button>

    </div>
</div>