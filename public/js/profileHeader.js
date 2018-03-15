$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    $('#editProfileHeader').click(function () {

        
        $('#profileHeaderModal').modal('show');
        getProfileHeaderText();
    });
    
    
    $('#profileHeaderSave').click(function () {

        $.post('/saveProfileHeaderText',{text : $('#profileHeaderModalText').val()},function (data) {
           console.log(data);
           window.location.reload();
        });
    });

    function getProfileHeaderText() {
        $.get('/getProfileHeaderText',function (data){
        if(data.toString() !== '[object Object]') {
            $('#profileHeaderModalText').text(data);

        }
        });
    }



});