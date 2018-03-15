
    <div class="col-md-5 card" id="addTopThreeSkillsForm">
        <div class="form-group">
            <label><?php echo app('translator')->getFromJson('slider.edit_page_top_three_skills'); ?></label>

                <select style="width: 100%" id="topThreeSkillsInput" class="form-control" multiple="multiple" ></select>


        </div>
        <div class="alert alert-danger" id="topThreeSkillsError"></div>
        <div class="form-group">
            <div class="topThreeSkillsBubblesContainer" style="max-height: 20em;overflow-y: scroll"></div>
        </div>
        <button class="btn btn-primary pull-right" id="saveTopThreeSkillsButton"><?php echo app('translator')->getFromJson('slider.edit_page_save'); ?></button>
        <button class="btn btn-default pull-right closeForm" style="margin-right: 1em" ><?php echo app('translator')->getFromJson('slider.edit_page_close'); ?></button>


    </div>