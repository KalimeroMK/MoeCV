$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });



    var topThreeSkillsInput = $('#topThreeSkillsInput');
    getSkillsJson(topThreeSkillsInput);
    TopSkillsInputEventListener(topThreeSkillsInput);


    function getSkillsJson(input) {
        var options = {
            url: "http://127.0.0.1:8000/skills/json",

            getValue: "name",

            list: {
                match: {
                    enabled: true
                }
            }
        };

        input.easyAutocomplete(options);
    }


    function TopSkillsInputEventListener(input) {
        input.keydown(function (e) {
            if(e.which === 13){
                console.log('enter is pressed');
                addTopSkillsBubbles($(this).val());
                $(this).val('');
            }
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

            closeBubbleIconEventListener();

        }
    }

    var  additionalSkillsInput = $('#additionalSkillsInput');
    getSkillsJson(additionalSkillsInput);
    AdditionalSkillsInputEventListener(additionalSkillsInput);



    function AdditionalSkillsInputEventListener(input) {
        input.keydown(function (e) {
            if(e.which === 13){
                console.log('enter is pressed');
                addAdditionalSkillsBubbles($(this).val());
                $(this).val('');
            }
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

    function closeBubbleIconEventListener() {
        $('.closeBubbleIcon').click(function () {
            console.log('closeIcon');
            var bubble = $(this).parent();
            bubble.remove();
        });
    }


    getCitiesJson();

    function getCitiesJson() {
        $.get('/cities/json',function (data) {
            $.each(data,function (i,city) {
                var option = $('<option value='+city.id+'>'+city.name+'</option>');
                $('#citiesSelect').append(option);
            });
        },'json');
    }

    // $('#saveSliderData').click(function () {
    //     saveUserInfo();
    //     getTopThreeSkills();
    //     getAdditionalSkills();
    //     saveSocialMedia();
    // });



    // function saveTopThreeSkills(skills) {
    //
    //     $.post('/saveTopThreeSkills', {skills: skills} ,function (data) {
    //
    //         console.log(data);
    //
    //     })
    // }
    //
    // function getTopThreeSkills() {
    //     var skills = [] ;
    //     $('.topSkillsBubble').each(function () {
    //         console.log('sbkjfd');
    //         skills.push($(this).text());
    //     });
    //
    //     console.log(skills);
    //     if(skills.length === 3){
    //
    //         saveTopThreeSkills($.unique(skills));
    //
    //     }else {
    //         // displayTopThreeSkillsError();
    //     }
    //
    // }
    //
    // function saveUserInfo() {
    //
    //         var cityId = $('#citiesSelect').val();
    //         var degree = $('#degreeInput').val();
    //         var job = $('#jobInput').val();
    //
    //
    //         $.post('/saveUserInfo',{
    //             cityId : cityId,
    //             degree : degree,
    //             job :job
    //         },function (data) {
    //             console.log(data);
    //
    //
    //         });
    //
    // }
    //
    // function getAdditionalSkills() {
    //     var skills = [] ;
    //     $('.additionalSkillsBubble').each(function () {
    //
    //         skills.push($(this).text());
    //     });
    //
    //     saveAdditionalSkills($.unique(skills));
    //
    //
    // }
    //
    // function saveAdditionalSkills(skills) {
    //
    //
    //     $.post('/saveAdditionalSkills', {skills: skills} ,function (data) {
    //
    //         console.log(data);
    //
    //     })
    // }
    //
    // function saveSocialMedia() {
    //     var facebook = $('#facebookInput').val();
    //     var twitter = $('#twitterInput').val();
    //     var linkedin = $('#linkedinInput').val();
    //     var dribble = $('#dribbbleInput').val();
    //     var github = $('#githubInput').val();
    //
    //
    //     $.post('/saveSocialMedia',
    //         {
    //             'facebook' : facebook,
    //             'twitter' : twitter,
    //             'linkedin' : linkedin,
    //             'dribble' : dribble,
    //             'github' : github
    //
    //         }
    //         ,function (data) {
    //             console.log(data);
    //             window.location.replace('/profile');
    //
    //         }
    //     );
    // }

});