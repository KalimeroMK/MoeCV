<div class="col-md-5 card">
    <div>
        <h4><?php echo app('translator')->getFromJson('slider.edit_page_work_experience'); ?><span style="margin-left: 5em; margin-right: 1.5em" class="pointer pull-right" id="addWorkExperience"><i class="fa fa-plus-circle" style="color: #EB5D5C; font-size: 1.2em"></i></span></h4>
        <span id="currentJobSpan"><?php echo app('translator')->getFromJson('slider.edit_page_work_experience_current_job'); ?></span>
        <select class="form-control" id="currentJob"></select>
        <div class="workExperienceContainer"></div>


    </div>
</div>