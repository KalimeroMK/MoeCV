    <div class="col-md-5 card">
    <form>
        <h4><?php echo app('translator')->getFromJson('slider.edit_page_personal_information_title'); ?></h4>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_personal_information_name'); ?></label>
            <input type="text" class="form-control" id="firstName" maxlength="100">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1"><?php echo app('translator')->getFromJson('slider.edit_page_personal_information_last_name'); ?></label>
            <input type="text" class="form-control" id="lastName" maxlength="100">
        </div>

        <div class="form-group form-inline">
            <label><?php echo app('translator')->getFromJson('slider.edit_page_personal_information_phone_number'); ?></label>
            <input type="text" class="form-control" id="phoneNumber" maxlength="20">
        </div>


        
            
        

        <div class="form-group form-inline" style="color: black">
            <label><?php echo app('translator')->getFromJson('slider.edit_page_personal_information_city'); ?></label>
            <select class="form-control" id="citiesSelect"></select>
        </div>


    </form>
</div>