<div class="col-md-5 card" id="addEducationForm">
    <div>
        <h4>@lang('slider.edit_page_education')</h4>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_education_info_degree')</label>
            <input type="text" class="form-control" id="degree" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_education_info_institution')</label>
            <input type="text" class="form-control" id="institution" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_education_webpage')</label>
            <input type="text" class="form-control" id="institutionWebpage" maxlength="255" style="width: 100%">
        </div>

        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_education_description')</label>
            <textarea type="text" class="form-control" id="educationDescription" cols="30" rows="5" maxlength="3000" style="width: 100%"></textarea>
        </div>

        <div class="form-group form-inline date-container">
            <label for="exampleInputEmail1">@lang('slider.edit_page_date_from')</label>
            <input maxlength="4" style="width: 6em" type="number" class="form-control" id="educationDateFrom">
            <label for="exampleInputEmail1" >@lang('slider.edit_page_date_to')</label>
            <input minlength="4" style="width: 6em" type="number" class="form-control" id="educationDateTo">
        </div>

        <button class="btn btn-primary pull-right" id="saveEducationButton">@lang('slider.edit_page_save')</button>
        <button class="btn btn-default pull-right closeForm" style="margin-right: 1em" >@lang('slider.edit_page_close')</button>

    </div>
</div>