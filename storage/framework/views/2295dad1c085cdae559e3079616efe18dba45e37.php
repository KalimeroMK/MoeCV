<div class="col-md-5 card" id="addWorkExperienceForm" data-isedit="0">
    <div>
        <h4><?php echo app('translator')->getFromJson('slider.edit_page_add_experience_info_title'); ?></h4>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_add_experience_info_work_position'); ?></label>
            <input type="text" class="form-control" id="workPosition" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_add_experience_info_company'); ?></label>
            <input type="text" class="form-control" id="company" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_add_experience_info_company_webpage'); ?></label>
            <input type="text" class="form-control" id="companyWebpage" maxlength="255" style="width: 100%">
        </div>

        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_add_experience_info_job_description'); ?></label>
            <textarea type="text" class="form-control" id="jobDescription" cols="30" rows="5" maxlength="3000" style="width: 100%" ></textarea>
        </div>

        <div class="form-group form-inline date-container">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_date_from'); ?></label>
            <input style="width: 6em" type="number" class="form-control" minlength="4" maxlength="4" id="dateFrom">
            <label for="exampleInputEmail1" ><?php echo app('translator')->getFromJson('slider.edit_page_date_to'); ?></label>
            <input style="width: 6em" type="number" class="form-control" maxlength="4" minlength="4" id="dateTo">
        </div>

        <button class="btn btn-primary pull-right" id="saveWorkExperienceButton"><?php echo app('translator')->getFromJson('slider.edit_page_save'); ?></button>
        <button  class="btn btn-default pull-right closeForm" style="margin-right: 1em" ><?php echo app('translator')->getFromJson('slider.edit_page_close'); ?></button>

    </div>
</div>

