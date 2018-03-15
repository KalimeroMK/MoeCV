<form  method="post" action="/file-upload" class="dropzone1" id="upload-profile-photo" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="fallback" >
        <input name="file" type="file" multiple />
    </div>
</form>