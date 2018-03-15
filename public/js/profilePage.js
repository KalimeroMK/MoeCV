$(document).ready(function () {


 /**
  * Top Three Skills Modal
  *
  */

    $('#addTopThreeSkills').click(function () {
        $('#topThreeSkillsModal').modal('show');
        $('.topThreeSkillsBubblesContainer').html('');
        $('#topThreeSkillsError').hide();
        getTopThreeSkillsFromDatabase();
        var topThreeSkillsInput = $('#topThreeSkillsInput');
        getSkillsJson(topThreeSkillsInput);
        TopSkillsInputEventListener(topThreeSkillsInput);
    });


    /**
     * getting skill json for auto complete
     *
     *
     * @param input
     */

    function getSkillsJson(input) {
        var options = {
            url: "/skills/json",

            getValue: "name",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        // input.easyAutocomplete(options);
    }


    function TopSkillsInputEventListener(input) {
        input.keydown(function (e) {
           if(e.which === 13){
               console.log('enter is pressed');
               addTopSkillsBubbles($(this).val());
               $(this).val('');
               $(this).blur();
               $(this).focus();
           }
        });
        $('.easy-autocomplete-container').on('click touch',function () {
            addTopSkillsBubbles($(this).find('.selected').text());
            $('#topThreeSkillsInput').val('');

        });
    }

    function addTopSkillsBubbles(data) {
        if(data !== '') {

            var bubble = $("<div class='topSkillsBubble bubble'></div>");
            var closeIcon = $("<i class='fa fa-times closeBubbleIcon pointer'></i>");
            bubble.text(data);
            bubble.append(closeIcon);
            $('.topThreeSkillsBubblesContainer').append(bubble);
            var el = document.getElementsByClassName('topThreeSkillsBubblesContainer');
            // var sortable = Sortable.create(el[0]);
            closeBubbleIconEventListener();

        }
    }

    /**
     * this function is called when save button on Top Three Modal is pressed
     *
     */

    $('#saveTopThreeSkills').click(function () {
        console.log('bla');
       getTopThreeSkills();
    });


    function getTopThreeSkills() {
        var skills = [] ;
        $('.topSkillsBubble').each(function () {
            console.log('sbkjfd');
            skills.push($(this).text());
        });

        console.log(skills);
        if(skills.length === 3){

            saveTopThreeSkills($.unique(skills));

        }else {
            displayTopThreeSkillsError();
        }

    }

    function displayTopThreeSkillsError(){
        $('#topThreeSkillsError').show().text('You must add three skills');
        $('#topThreeSkillsError').text('You must add three skills');
    }

    function saveTopThreeSkills(skills) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveTopThreeSkills', {skills: skills} ,function (data) {

            if(data === "Error"){
                $('#topThreeSkillsError').show().text('You can only add skills from list below');
                $('#topThreeSkillsError').text('You can only add skills from list below');
            }else {
                $('#topThreeSkillsModal').modal('hide');
                window.location.reload();
            }

            console.log(data);

        })
    }

    /**
     *  This function is called when modal is showed
     *  we display already saved skills from database
     *
     */

    function getTopThreeSkillsFromDatabase() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.get('/getTopThreeSkills' ,function (data) {

            console.log(data);

            $.each(data,function (i,skill) {
                console.log(skill);
                addTopSkillsBubbles(skill.name);
            });

        },'json')
    }

    /**
     * Additional Skills Modal
     *
     */

    $('#addAdditionalSkills').click(function () {
        $('#additionalSkillsModal').modal('show');
        $('.additionalSkillsBubblesContainer').html('');
        getAdditionalSkillsFromDatabase();

        var  additionalSkillsInput = $('#additionalSkillsInput');
        getSkillsJson(additionalSkillsInput);
        AdditionalSkillsInputEventListener(additionalSkillsInput);
    });

    function AdditionalSkillsInputEventListener(input) {
        input.keydown(function (e) {
            if(e.which === 13){
                console.log('enter is pressed');
                addAdditionalSkillsBubbles($(this).val());
                $(this).val('');
            }
        });

        $('.easy-autocomplete-container').on('click touch',function () {
            addAdditionalSkillsBubbles($(this).find('.selected').text());
            $('#additionalSkillsInput').val('');

        });
    }

    function addAdditionalSkillsBubbles(data) {
        if(data !== '') {

            var bubble = $("<div class='additionalSkillsBubble bubble'></div>");
            var closeIcon = $("<i class='fa fa-times closeBubbleIcon pointer'></i>");
            bubble.text(data);
            bubble.append(closeIcon);
            $('.additionalSkillsBubblesContainer').prepend(bubble);
            closeBubbleIconEventListener();

        }
    }

    /**
     * This function is called when save button on Additional Skills Modal is called
     *
     */

    $('#saveAdditionalSkills').click(function () {
        console.log('bla');
        getAdditionalSkills();
    });

    function getAdditionalSkillsFromDatabase() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.get('/getAdditionalSkills' ,function (data) {

            console.log(data);

            $.each(data,function (i,skill) {
                console.log(skill);
                addAdditionalSkillsBubbles(skill.name);
            });

        },'json')
    }

    function getAdditionalSkills() {
        var skills = [] ;
        $('.additionalSkillsBubble').each(function () {

            skills.push($(this).text());
        });

            saveAdditionalSkills($.unique(skills));


    }

    function saveAdditionalSkills(skills) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveAdditionalSkills', {skills: skills} ,function (data) {
            if(data === "Error"){
                $('#additionalSkillsError').show().text('You can only add skills from list below');
                $('#additionalSkillsError').text('You can only add skills from list below');
            }else {


                $('#additionalSkillsModal').modal('hide');
                window.location.reload();
            }
            console.log(data);

        })
    }


    /**
     * Close bubble icon
     *
     * This function is called when close button on bubbles is pressed
     *
     */

     function closeBubbleIconEventListener() {
        $('.closeBubbleIcon').click(function () {
            console.log('closeIcon');
            var bubble = $(this).parent();
            bubble.remove();
        });
    }




    /**
     * Best Advice Modal
     *
     */

    $('#bestAdvice').click(function () {
       $('#bestAdviceModal').modal('show');
       getBestAdvice();
    });

    function getBestAdvice() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.get('/getBestAdvice' ,function (data) {

            console.log(data);
            if(data.toString() !== '[object Object]') {
                $('#bestAdviceText').text(data);
            }



        },'json')
    }

    /**
     * This function is called when save button on Best Advice Modal is pressed
     *
     */

    $('#bestAdviceSave').click(function () {
        var text = $('#bestAdviceText').val();
        saveBestAdvice(text);
    });

    function saveBestAdvice(text) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveBestAdvice', {text: text} ,function (data) {
            $('#bestAdviceModal').modal('hide');
            console.log(data);
            window.location.reload();

        });
    }

    /**
     * Availability Modal
     *
      */
    $('#availability').click(function () {
        $('#availabilityModal').modal('show');
    });

    $('.edit-icon-container').click(function () {
        $('#availabilityModal').modal('show');
    });

    $('#availabilitySave').click(function () {
       var fullTime = $('#availableFullTime').prop('checked');
       var partTime = $('#availablePartTime').prop('checked');
       var freelance = $('#availableFreelance').prop('checked');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveAvailability',
            {
                fullTime: (fullTime === true) ? 1 : 0,
                partTime: (partTime === true) ? 1 : 0,
                freelance: (freelance === true) ? 1 : 0
            } ,function (data) {
            $('#availabilityModal').modal('hide');
            console.log(data);
            window.location.reload();

        });

    });

    /**
     * Upload photo
     *
     */

    $('.profile-image-container').click(function () {
        $('#uploadPhotoModal').modal('show');
        // $(".dropzone").dropzone({ url: "/file/post" });

    });

    $('#savePhoto').click(function () {
        $('#upload-profile-photo').submit();
    })

    /**
     * Add Social Networks
     *
     */

    $('#addSocialMedia').click(function () {
        $('#socialNetworksModal').modal('show');
    });

    $('#saveSocialNetworks').click(function () {
        var facebook = $('#facebookInput').val();
        var twitter = $('#twitterInput').val();
        var linkedin = $('#linkedinInput').val();
        var dribble = $('#dribbbleInput').val();
        var github = $('#githubInput').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post('/saveSocialMedia',
            {
                'facebook' : facebook,
                'twitter' : twitter,
                'linkedin' : linkedin,
                'dribble' : dribble,
                'github' : github

            }
            ,function (data) {
                console.log(data);
                window.location.reload();
            }
        );
    });

    $('#socialMedia').click(function () {
        $('#socialNetworksModal').modal('show');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.get('/getSocialMedia',function (data) {
           console.log(data);
            var social = data.social_networks;
           for(var i=0; i < social.length; i++){
               $('#'+social[i].name+'Input').val(social[i].pivot.url);
           }
        });
    });












});

