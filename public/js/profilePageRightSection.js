$(document).ready(function () {



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });




    function getExperienceTypesJson() {
        var options = {
            url: "http://127.0.0.1:8000/experience_types/json",

            getValue: "name",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        $('#experienceTypeInput').easyAutocomplete(options);
    }






    /**
     * Color Picker
     *
     */

    $('#colorPicker').click(function () {
       $('#colorModal').modal('show');
    });

    $('.colorCircle').click(function () {
        var color = $(this).attr('data-color');
            $.post('/saveColor',{color: color},function (data) {
               console.log(data);
               window.location.reload();
            });
    });


    /**
     * Share profile
     *
     */

    $('#shareButton').click(function () {
       $('#shareProfileModal').modal('show');
        setTimeout(function(){
            getPublicProfileLink();
        }, 300);
    });

    function getPublicProfileLink() {
        $.get('/getSharedProfile',function (data) {
            console.log(data);
            document.getElementById("publicLinkEn").href = data.toString() +'/en';
            document.getElementById("publicLinkMk").href = data.toString() +'/mk';

        });
    }















});