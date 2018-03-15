<div class="col-md-5 card" id="addLanguageForm" data-isedit="0">
    <div>
        <h4>@lang('slider.edit_page_add_language_info_title')</h4>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_add_language_name')</label>
            <input type="text" class="form-control" id="languageName" maxlength="255" style="width: 100%">
        </div>
        <div class="form-group form-inline">
            <label for="exampleInputEmail1">@lang('slider.edit_page_add_language_level')</label>
            <select type="text" class="form-control" id="languageLevel" maxlength="255" style="width: 100%">
                <option value="@lang('slider.edit_page_add_language_elementary_proficiency')">@lang('slider.edit_page_add_language_elementary_proficiency')</option>
                <option value="@lang('slider.edit_page_add_language_limited_working_proficiency')">@lang('slider.edit_page_add_language_limited_working_proficiency')</option>
                <option value="@lang('slider.edit_page_add_language_professional_working_proficiency')">@lang('slider.edit_page_add_language_professional_working_proficiency')</option>
                <option value="@lang('slider.edit_page_add_language_full_professional_proficiency')">@lang('slider.edit_page_add_language_full_professional_proficiency')</option>
                <option value="@lang('slider.edit_page_add_language_native_or_bilingual_proficiency')">@lang('slider.edit_page_add_language_native_or_bilingual_proficiency')</option>
            </select>
        </div>



        <button class="btn btn-primary pull-right" id="saveLanguageButton">@lang('slider.edit_page_save')</button>
        <button  class="btn btn-default pull-right closeForm" style="margin-right: 1em" >@lang('slider.edit_page_close')</button>

    </div>
</div>

