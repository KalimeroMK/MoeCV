$(document).ready(function () {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


  $('#addWorkExperience').click(function () {
      clearForms();
      $('#addWorkExperienceForm').show();
      $('#addWorkExperienceForm').addClass('animated bounceInRight');
      setTimeout(function() { $('#addWorkExperienceForm').scrollTop(0); }, 300);
      $('#addWorkExperienceForm').attr('data-isedit',0);
      clearAddWorkExperienceForm();
      addCloseEventListener();

  });

  var dataExperienceArray = [];
  $('#saveWorkExperienceButton').click(function () {
      // console.log($('#addWorkExperienceForm').attr('data-isedit'));
      var dataExperience = {};
      dataExperience.position = $('#workPosition').val();
      dataExperience.webPage = $('#companyWebpage').val();
      dataExperience.company = $('#company').val();
      dataExperience.description = $('#jobDescription').val();
      dataExperience.dateFrom = $('#dateFrom').val();
      dataExperience.dateTo = $('#dateTo').val();
      dataExperience.deleted =false;
      if($('#addWorkExperienceForm').attr('data-isedit') === '0'){
          // console.log('hi');
          dataExperienceArray.push(dataExperience);
      }else {
          // dataExperience.editId = $('#addWorkExperienceForm').attr('data-edit-experience-id');

          dataExperience.id = $('#addWorkExperienceForm').attr('data-database-experience-id');
          var editExperienceId = $('#addWorkExperienceForm').attr('data-edit-experience-id');
          dataExperienceArray[editExperienceId] = dataExperience;
      }

      refreshWorkExperienceListItems(dataExperienceArray);
      $('#addWorkExperienceForm').hide();

      // console.log(dataExperienceArray);
  });

  function refreshWorkExperienceListItems(experienceArray) {
      $('.workExperienceContainer').html('');
      $('#currentJob').html('');
      $('#currentJob').hide();
      $('#currentJobSpan').hide();

      for (var i= 0; i< experienceArray.length ; i++){

          var listItem = $('<div class="workExperienceItem animated slideInDown" data-work-database-id='+experienceArray[i].id+' data-experience-id='+i+'>'+'<span class="experienceItemText">'+experienceArray[i].company+'</span>'+'<span class="pull-right editWorkExperience pointer"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="pull-right deleteWorkExperience pointer"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>');

          var currentJobOptions = $('<option value='+i+'>'+experienceArray[i].company+'</option>');
          dataExperienceArray[i].editId = i;
          if(dataExperienceArray[i].deleted === false){
              $('#currentJob').show();
              $('#currentJobSpan').show();
              $('.workExperienceContainer').append(listItem);
              $('#currentJob').append(currentJobOptions);
          }

      }

      $('.deleteWorkExperience').click(function () {
          // console.log('hi');
          var id = $(this).parent().attr('data-experience-id');
          dataExperienceArray[id].deleted = true;
          // console.log(dataExperienceArray);
          $(this).parent().remove();
          refreshWorkExperienceListItems(dataExperienceArray);
      });

      $('.editWorkExperience').click(function () {
          clearForms();
          $('#addWorkExperienceForm').show();
          $('#addWorkExperienceForm').addClass('animated bounceInRight');
          setTimeout(function() { $('#addWorkExperienceForm').scrollTop(0); }, 300);
          $('#addWorkExperienceForm').attr('data-isedit',1);
          $('#addWorkExperienceForm').attr('data-edit-experience-id',$(this).parent().attr('data-experience-id'));
          $('#addWorkExperienceForm').attr('data-database-experience-id',$(this).parent().attr('data-work-database-id'));

          addCloseEventListener();

          // var id = $(this).parent().attr('data-work-database-id');

          var id =  $(this).parent().attr('data-experience-id');

          var experience = $.grep(dataExperienceArray, function(value,i) {

              // console.log(value);

              return parseInt(value.editId) === parseInt(id);
          });

          experience = experience[0];
          $('#workPosition').val(experience.position);
          $('#company').val(experience.company);
          $('#companyWebpage').val(experience.webPage);
          $('#jobDescription').val(experience.description);
          $('#dateFrom').val(experience.dateFrom);
          $('#dateTo').val(experience.dateTo);



      });
  }


    /**
     * Education Form
     *
     */

    $('#addEducation').click(function () {
        clearForms();
        $('#addEducationForm').show();
        $('#addEducationForm').addClass('animated bounceInRight');
        setTimeout(function() { $('#addEducationForm').scrollTop(0); }, 300);
        $('#addEducationForm').attr('data-isedit',0);
        clearAddEducationForm();
        addCloseEventListener();

    });



    var dataEducationArray = [];
    $('#saveEducationButton').click(function () {
        var dataEducation = {} ;
        dataEducation.degree = $('#degree').val();
        dataEducation.institution = $('#institution').val();
        dataEducation.webPage = $('#institutionWebpage').val();
        dataEducation.description = $('#educationDescription').val();
        dataEducation.dateFrom = $('#educationDateFrom').val();
        dataEducation.dateTo = $('#educationDateTo').val();
        dataEducation.deleted = false;
        if($('#addEducationForm').attr('data-isedit') === '0'){
            dataEducationArray.push(dataEducation);
        }else {
            dataEducation.id = $('#addEducationForm').attr('data-database-education-id');

            var editExperienceId = $('#addEducationForm').attr('data-edit-education-id');
            dataEducationArray[editExperienceId] = dataEducation;

        }

        refreshEducationListItems(dataEducationArray);
        $('#addEducationForm').hide();
        // console.log(dataEducationArray);
    });

    function refreshEducationListItems(educationArray) {
        $('.educationContainer').html('');
        $('#educationOptions').html('');
        $('#educationOptions').hide();
        $('#educationOptionsSpan').hide();
        for (var i= 0; i< educationArray.length ; i++){

            var listItem = $('<div class="educationItem animated slideInDown" data-education-database-id='+educationArray[i].id+' data-education-id='+i+'>'+'<span class="experienceItemText">'+educationArray[i].degree+'</span>'+'<span class="pull-right editEducation pointer"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="pull-right deleteEducation pointer"><i class="fa fa-minus-circle"></i></span></div>')

            var currentEducationptions = $('<option value='+i+'>'+educationArray[i].degree+'</option>');

            dataEducationArray[i].editId = i;

            if(dataEducationArray[i].deleted === false){
                $('#educationOptions').show();
                $('#educationOptionsSpan').show();
                $('#educationOptions').append(currentEducationptions);
                $('.educationContainer').append(listItem);
            }
        }

        $('.deleteEducation').click(function () {
            // console.log('hi');
            var id = $(this).parent().attr('data-education-id');
            dataEducationArray[id].deleted = true;
            $(this).parent().remove();
            refreshEducationListItems(dataEducationArray);
        });


        $('.editEducation').click(function () {
            clearForms();
            $('#addEducationForm').show();
            $('#addEducationForm').addClass('animated bounceInRight');
            setTimeout(function() { $('#addEducationForm').scrollTop(0); }, 300);
            $('#addEducationForm').attr('data-isedit',1);
            $('#addEducationForm').attr('data-edit-education-id',$(this).parent().attr('data-education-id'));
            $('#addEducationForm').attr('data-database-education-id',$(this).parent().attr('data-education-database-id'));

            addCloseEventListener();
            var id = $(this).parent().attr('data-education-id');
            // console.log(dataEducationArray);
            var experience = $.grep(dataEducationArray, function(value,i) {


                return value.editId === parseInt(id);
            });
            experience = experience[0];
            $('#degree').val(experience.degree);
            $('#institution').val(experience.institution);
            $('#institutionWebpage').val(experience.webPage);
            $('#educationDescription').val(experience.description);
            $('#educationDateFrom').val(experience.dateFrom);
            $('#educationDateTo').val(experience.dateTo);



        });


    }

    /**
     * Top Skills
     *
     */

    $('#addTopSkills').click(function () {
        clearForms();
        $('#addTopThreeSkillsForm').show();
        $('#addTopThreeSkillsForm').addClass('animated bounceInRight');
        setTimeout(function() { $('#addTopThreeSkillsForm').scrollTop(0); }, 300);
        $('#addTopThreeSkillsForm').attr('data-isedit',0);
        $('#topThreeSkillsInput').val([]).trigger('change');
        addCloseEventListener();

    });
    var topThreeSkills = [];
    $('#saveTopThreeSkillsButton').click(function () {
        topThreeSkills = [];
        $.fn.reverse = [].reverse;
        $('#addTopThreeSkillsForm .select2-selection__choice').reverse().each(function () {
            var text = $(this).text();
            topThreeSkills.push(text.substring(1));
        });





            refreshTopThreeSkillsListItems();

        
            // displayTopThreeSkillsError();
        

        $('#addTopThreeSkillsForm').hide();
        // console.log(dataEducationArray);
    });


    function refreshTopThreeSkillsListItems() {
        // console.log('dgf');

        $('.topSkillsContainer').html('');

        var topSkillsTitle = $('.topSkillsTitle').text();

            var listItem = $('<div class="topThreeItem animated slideInDown">'+topSkillsTitle+'<span class="pull-right editSkills pointer"><i class="fa fa-pencil"></i></span><span class="pull-right deleteSkills pointer"><i class="fa fa-minus-circle"></i></span></div>');
            $('.topSkillsContainer').append(listItem);
        $('#addTopSkills').hide();

        $('.deleteSkills').click(function () {
            // console.log('hi');
            topThreeSkills = [];
            $(this).parent().remove();
            $('#addTopSkills').show();
        });

        $('.editSkills').click(function () {
            clearForms();
            $('#addTopThreeSkillsForm').show();
            $('#addTopThreeSkillsForm').addClass('animated bounceInRight');
            setTimeout(function() { $('#addTopThreeSkillsForm').scrollTop(0); }, 300);
            $('#addTopThreeSkillsForm').attr('data-isedit',1);
            addCloseEventListener();

        });
    }

    /**
     * Additional Skills
     *
     */

    $('#addAdditionalSkills').click(function () {
        clearForms();
        $('#addAdditionalSkillsForm').show();
        $('#addAdditionalSkillsForm').addClass('animated bounceInRight');
        setTimeout(function() { $('#addAdditionalSkillsForm').scrollTop(0); }, 300);
        $('#addAdditionalSkillsForm').attr('data-isedit',0);
        $('#additionalSkillsInput').val([]).trigger('change');
        addCloseEventListener();

    });

    var additionalSkills = [];
    $('#saveAdditionalSkillsButton').click(function () {
        additionalSkills = [];
        $.fn.reverse = [].reverse;
        $('#addAdditionalSkillsForm .select2-selection__choice').reverse().each(function () {
            var text = $(this).text();
            additionalSkills.push(text.substring(1));
        });




            refreshAdditionalSkillsListItems();

        $('#addAdditionalSkillsForm').hide();
        // console.log(dataEducationArray);
    });

    function refreshAdditionalSkillsListItems() {
        $('.additionalSkillsContainer').html('');


        var additionalSkillsTitle = $('.additionalSkillsTitle').text();
        var listItem = $('<div class="additionalSkillsItem animated slideInDown">'+additionalSkillsTitle+'<span class="pull-right editAdditionalSkills pointer"><i class="fa fa-pencil"></i></span><span class="pull-right deleteAdditionalSkills pointer"><i class="fa fa-minus-circle"></i></span></div>')
        $('.additionalSkillsContainer').append(listItem);
        $('#addAdditionalSkills').hide();

        $('.deleteAdditionalSkills').click(function () {
            // console.log('hi');
            additionalSkills = [];
            $(this).parent().remove();
            $('#addAdditionalSkills').show();
        });

        $('.editAdditionalSkills').click(function () {
            clearForms();
            $('#addAdditionalSkillsForm').show();
            $('#addAdditionalSkillsForm').addClass('animated bounceInRight');
            setTimeout(function() { $('#addAdditionalSkillsForm').scrollTop(0); }, 300);
            $('#addAdditionalSkillsForm').attr('data-isedit',1);
            addCloseEventListener();
        });
    }

    /**
     * Save All
     *
     */

    $('#saveAllButton').click(function () {

        NProgress.start();

        saveUserInfo();

    });

    function saveUserInfo() {
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var city = $('#citiesSelect').val();
        var phone = $('#phoneNumber').val();
        $.post('/saveUserInfoFromEditPage',{
            cityId: city,
            firstName: firstName,
            lastName: lastName,
            phoneNumber: phone
        },function (data) {
            saveWorkExperience(dataExperienceArray);
            NProgress.set(0.2);
        });
    }

    function saveWorkExperience(workExperienceArray) {
        $.post('/saveWorkExperience',{
            workExperience: workExperienceArray,
            currentJob: workExperienceArray[$('#currentJob').val()]

        },function (data) {
            // console.log(data);
            saveEducationExperience(dataEducationArray);
            NProgress.set(0.3);


        });
    }


    function saveEducationExperience(educationExperienceArray) {
        $.post('/saveEducationExperience',{
            educationExperience: educationExperienceArray,
            currentEducation: educationExperienceArray[$('#educationOptions').val()]
        },function (data) {
            // console.log(data);

            saveLanguage(languageArray);
            NProgress.set(0.4);

        });
    }

    function saveLanguage(languageArray) {
        $.post('/saveLanguage',{
            language: languageArray,

        },function (data) {
            // console.log(data);
            saveProjects(projectsArray);
            NProgress.set(0.5);



        });
    }

    function saveProjects(projectsArray) {
        $.post('/saveProjects',{
            projects: projectsArray,

        },function (data) {
            // console.log(data);
            saveTopThreeSkillsExperience(topThreeSkills);




        });
    }



    function saveTopThreeSkillsExperience(skills) {

        $.post('/saveTopThreeSkills', {skills: skills} ,function (data) {

            // console.log(data);

            saveAdditionalSkills(additionalSkills);
            NProgress.set(0.6);


        })
    }


    function saveAdditionalSkills(skills) {


        $.post('/saveAdditionalSkills', {skills: skills} ,function (data) {

            // console.log(data);
            saveSummary();
            NProgress.set(0.7);

        })
    }


    function saveSummary() {

        $.post('/saveProfileHeaderText',{text : $('#summary').val()},function (data) {
            // console.log('summary');
            // console.log(data);
            saveSocialMedia();
            NProgress.set(0.8);

        });
    }

    function saveSocialMedia() {
        var facebook = $('#facebookInput').val();
        var twitter = $('#twitterInput').val();
        var linkedin = $('#linkedinInput').val();
        var dribble = $('#dribbbleInput').val();
        var github = $('#githubInput').val();


        $.post('/saveSocialMedia',
            {
                'facebook' : facebook,
                'twitter' : twitter,
                'linkedin' : linkedin,
                'dribble' : dribble,
                'github' : github

            }
            ,function (data) {
                // console.log(data);
                saveAvability();
                NProgress.set(0.9);



            }
        );
    }


    function saveAvability() {
        var fullTime = $('#availableFullTime').prop('checked');
        var partTime = $('#availablePartTime').prop('checked');
        var freelance = $('#availableFreelance').prop('checked');


        $.post('/saveAvailability',
            {
                fullTime: (fullTime === true) ? 1 : 0,
                partTime: (partTime === true) ? 1 : 0,
                freelance: (freelance === true) ? 1 : 0
            } ,function (data) {

                NProgress.done();
                window.location.replace('/profile');


            });
    }

    getSkillsJson();
    getCitiesJson();

    function getCitiesJson() {
        $.get('/cities/json',function (data) {

            $.each(data,function (i,city) {
                var option = $('<option value='+city.id+'>'+city.name+'</option>');
                // $('#citiesSelect').append(option);
            });
            $('#citiesSelect').select2({tags:true});
            getUserInformation();

        },'json');
    }

    function getSkillsJson() {
        $.get('/skills/json',function (data) {
            var topSkillsInput = $('#topThreeSkillsInput');
            var  additionalSkillsInput = $('#additionalSkillsInput');
            $.each(data,function (i,skill) {
                var option = $('<option value='+skill.id+'>'+skill.name+'</option>');
                topSkillsInput.append(option);

            });

            $.each(data,function (i,skill) {
                var option = $('<option value='+skill.id+'>'+skill.name+'</option>');
                additionalSkillsInput.append(option);

            });

            $('#topThreeSkillsInput').select2({tags: true, maximumSelectionLength:3});
            $('#additionalSkillsInput').select2({tags: true, maximumSelectionLength: 100});

            getUserInformation();

        },'json');
    }

    /**
     * Edit Data
     *
     */

    getUserWorkExperience();

    function getUserInformation() {
        $.get('/getUserInfoData',function (data) {
            // console.log(data.user);
            $('#firstName').val(data.user.first_name);
            $('#lastName').val(data.user.last_name);
            $('#phoneNumber').val(data.user.phone);

            $('#citiesSelect').val(data.cityId).trigger('change');
        });
    }

    function getUserWorkExperience() {
        $.get('/getAllUserData',function (data) {
            // console.log(data);
            fillWWorkExperienceWithData(data.experiences);
            fillTopThreeSkillsWithData(data.top_three_skills);
            fillAdditionalSkillsWithData(data.skills);
            fillSummaryWithData(data.profile_header_text);
            fillSocialNetworksWithData(data);
            fillAvailabilityWithData(data);
            fillLanguagesWithData(data.languages);

        });
    }

    function fillWWorkExperienceWithData(data) {
        $.each(data,function (i,experience) {
            if(experience.experience_type_id === 2){
                var dataExperience = {} ;
                dataExperience.id =  experience.id;
                dataExperience.position = experience.position;
                dataExperience.webPage = experience.webpage;
                dataExperience.company = experience.company;
                dataExperience.description = experience.info;
                dataExperience.dateFrom = experience.from;
                dataExperience.dateTo = experience.to;
                dataExperience.deleted = false;
                dataExperienceArray.push(dataExperience);
                refreshWorkExperienceListItems(dataExperienceArray);
            }else if(experience.experience_type_id === 1){
                var dataEducation = {} ;
                dataEducation.id = experience.id;
                dataEducation.degree = experience.position;
                dataEducation.institution = experience.company;
                dataEducation.webPage = experience.webpage;
                dataEducation.description = experience.info;
                dataEducation.dateFrom = experience.from;
                dataEducation.dateTo = experience.to;
                dataEducation.deleted = false;
                dataEducationArray.push(dataEducation);
                refreshEducationListItems(dataEducationArray);
            }else if(experience.experience_type_id === 3){
                var project = {} ;
                project.id =  experience.id;
                project.position = experience.position;
                project.webPage = experience.webpage;
                project.description = experience.info;
                project.dateFrom = experience.from;
                project.dateTo = experience.to;
                project.deleted = false;
                projectsArray.push(project);
                refreshProjectsListItems(projectsArray);
            }
        })
    }

    function fillLanguagesWithData(data) {
        $.each(data,function (i,language) {

                var dataLanguage = {} ;
                dataLanguage.id =  language.id;
                dataLanguage.name = language.name;
                dataLanguage.level = language.level;
                dataLanguage.deleted = false;
                languageArray.push(dataLanguage);
                refreshLanguageListItems(languageArray);

        });
    }

    function fillTopThreeSkillsWithData(data) {
        $.each(data,function (index,skill) {
            topThreeSkills.push(skill.name);
            refreshTopThreeSkillsListItems();
            addTopSkillsBubbles(skill.name,index);

        })
    }

    function fillAdditionalSkillsWithData(data) {

        $.each(data,function (index,skill) {
            additionalSkills.push(skill.name);
            refreshAdditionalSkillsListItems();
            addAdditionalSkillsBubbles(skill.name,index )
        })
    }

    function fillSummaryWithData(data) {
        $('#summary').text(data);
        var max = 150;
        var newCount = max - $('#summary').val().length;
        $('#textAreaCounter').text(newCount);
    }

    function fillSocialNetworksWithData(socialNetworksData) {
        var socialNetworksData =  socialNetworksData.social_networks;


        $.each(socialNetworksData,function (index,socialNetwork) {
            var socialNetworkName = socialNetwork.name;
            var socialNetworkUrl = socialNetwork.pivot.url;

            $('#'+socialNetworkName+'Input').val(socialNetworkUrl);
        })
    }

    function fillAvailabilityWithData(data) {
        // console.log(data);
        var availableFullTime = data.available_full_time;
        var availablePartTime = data.available_part_time;
        var availableFreelance = data.available_intern;

        if(availableFullTime) $('#availableFullTime').prop( "checked", true );
        if(availablePartTime) $('#availablePartTime').prop( "checked", true );
        if(availableFreelance) $('#availableFreelance').prop( "checked", true );

    }



    function addTopSkillsBubbles(data,index) {
        if(data !== '') {
            // console.log(data);
            var newOption = new Option(data, index,true,true);
            $("#topThreeSkillsInput").prepend(newOption).trigger('change');
            // var bubble = $("<div class='topSkillsBubble bubble'></div>");
            // var closeIcon = $("<i class='fa fa-times closeBubbleIcon pointer'></i>");
            // bubble.text(data);
            // bubble.append(closeIcon);
            // $('.topThreeSkillsBubblesContainer').append(bubble);
            // var el = document.getElementsByClassName('topThreeSkillsBubblesContainer');
            // var sortable = Sortable.create(el[0]);
            // closeBubbleIconEventListener();

        }
    }

    function closeBubbleIconEventListener() {
        $('.closeBubbleIcon').click(function () {
            // console.log('closeIcon');
            var bubble = $(this).parent();
            bubble.remove();
        });
    }

    function addAdditionalSkillsBubbles(data,index) {

        if(data !== '') {
            var newOption = new Option(data, index,true,true);
            $("#additionalSkillsInput").append(newOption).trigger('change');
            // var bubble = $("<div class='additionalSkillsBubble bubble'></div>");
            // var closeIcon = $("<i class='fa fa-times closeBubbleIcon pointer'></i>");
            // bubble.text(data);
            // bubble.append(closeIcon);
            // $('.additionalSkillsBubblesContainer').prepend(bubble);
            // closeBubbleIconEventListener();

        }
    }


    function addCloseEventListener() {
        $('.closeForm').click(function () {
            if($(this).parent().attr('id') === undefined){
                $(this).parent().parent().hide();

            }else {
                $(this).parent().hide();
            }
        })
    }


    function clearAddWorkExperienceForm() {
        $('#workPosition').val('');
        $('#companyWebpage').val('');
        $('#company').val('');
        $('#jobDescription').val('');
        $('#dateFrom').val('');
        $('#dateTo').val('');
    }

    function clearAddEducationForm() {
        $('#degree').val('');
        $('#institution').val('');
        $('#institutionWebpage').val('');
        $('#educationDescription').val('');
        $('#educationDateFrom').val('');
        $('#educationDateTo').val('');
    }

    function clearAddLanguageForm() {
        $('#languageName').val('');
    }

    function clearProjectsForm() {
        $('#projectName').val('');
        $('#projectUrl').val('');
        $('#projectDescription').val('');
        $('#projectDateFrom').val('');
        $('#projectDateTo').val('');
    }

    function clearForms() {
        $('#addWorkExperienceForm').hide();
        $('#addEducationForm').hide();
        $('#addTopThreeSkillsForm').hide();
        $('#addAdditionalSkillsForm').hide();
        $('#addLanguageForm').hide();
    }


    /**
     * Language Form
     *
     */

    $('#addLanguage').click(function () {
        clearForms();
        $('#addLanguageForm').show();
        $('#addLanguageForm').addClass('animated bounceInRight');
        setTimeout(function() { $('#addLanguageForm').scrollTop(0); }, 300);
        $('#addLanguageForm').attr('data-isedit',0);
        clearAddLanguageForm();
        addCloseEventListener();

    });

    var languageArray = [];
    $('#saveLanguageButton').click(function () {
        // console.log($('#addWorkExperienceForm').attr('data-isedit'));
        var language = {};
        language.name = $('#languageName').val();
        language.level = $('#languageLevel').val();
        language.deleted =false;
        if($('#addLanguageForm').attr('data-isedit') === '0'){
            // console.log('hi');
            languageArray.push(language);
        }else {
            // dataExperience.editId = $('#addWorkExperienceForm').attr('data-edit-experience-id');

            language.id = $('#addLanguageForm').attr('data-database-language-id');
            var editLanguageId = $('#addLanguageForm').attr('data-edit-language-id');
            languageArray[editLanguageId] = language;
        }

        refreshLanguageListItems(languageArray);
        $('#addLanguageForm').hide();
        // console.log(dataExperienceArray);
    });


    function refreshLanguageListItems(languageArray) {
        $('.languagesContainer').html('');

        for (var i= 0; i< languageArray.length ; i++){

            var listItem = $('<div class="languageItem animated slideInDown" data-language-database-id='+languageArray[i].id+' data-language-id='+i+'>'+'<span class="experienceItemText">'+languageArray[i].name+'</span>'+'<span class="pull-right editLanguage pointer"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="pull-right deleteLanguage pointer"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>');


            languageArray[i].editId = i;
            if(languageArray[i].deleted === false){

                $('.languagesContainer').append(listItem);

            }

        }

        $('.deleteLanguage').click(function () {
            // console.log('hi');
            var id = $(this).parent().attr('data-language-id');
            languageArray[id].deleted = true;

            $(this).parent().remove();
            refreshLanguageListItems(languageArray);
        });

        $('.editLanguage').click(function () {
            clearForms();
            $('#addLanguageForm').show();
            $('#addLanguageForm').addClass('animated bounceInRight');
            setTimeout(function() { $('#addLanguageForm').scrollTop(0); }, 300);
            $('#addLanguageForm').attr('data-isedit',1);
            $('#addLanguageForm').attr('data-edit-language-id',$(this).parent().attr('data-language-id'));
            $('#addLanguageForm').attr('data-database-language-id',$(this).parent().attr('data-language-database-id'));

            addCloseEventListener();

            // var id = $(this).parent().attr('data-work-database-id');

            var id =  $(this).parent().attr('data-language-id');

            var experience = $.grep(languageArray, function(value,i) {

                // console.log(value);

                return parseInt(value.editId) === parseInt(id);
            });

            experience = experience[0];
            $('#languageName').val(experience.name);
            $('#languageLevel').val(experience.level).trigger('change');




        });
    }


    /**
     * Projects
     *
     */



    $('#addAccomplishmentsAndProjects').click(function () {
        clearForms();
        $('#addAccomplishmentsAndProjectsForm').show();
        $('#addAccomplishmentsAndProjectsForm').addClass('animated bounceInRight');
        setTimeout(function() { $('#addAccomplishmentsAndProjectsForm').scrollTop(0); }, 300);
        $('#addAccomplishmentsAndProjectsForm').attr('data-isedit',0);
        clearProjectsForm();
        addCloseEventListener();

    });

        var projectsArray = [];
    $('#saveAccomplishmentsAndProjectsButton').click(function () {
        var dataExperience = {};
        dataExperience.position = $('#projectName').val();
        dataExperience.webPage = $('#projectUrl').val();
        dataExperience.description = $('#projectDescription').val();
        dataExperience.dateFrom = $('#projectDateFrom').val();
        dataExperience.dateTo = $('#projectDateTo').val();
        dataExperience.deleted =false;
        if($('#addAccomplishmentsAndProjectsForm').attr('data-isedit') === '0'){
            // console.log('hi');
            projectsArray.push(dataExperience);
        }else {
            // dataExperience.editId = $('#addWorkExperienceForm').attr('data-edit-experience-id');

            dataExperience.id = $('#addAccomplishmentsAndProjectsForm').attr('data-database-project-id');
            var editExperienceId = $('#addAccomplishmentsAndProjectsForm').attr('data-edit-project-id');
            projectsArray[editExperienceId] = dataExperience;
        }

        refreshProjectsListItems(projectsArray);
        $('#addAccomplishmentsAndProjectsForm').hide();

    });

    function refreshProjectsListItems(experienceArray) {
        $('.accomplishmentsAndProjectsContainer').html('');


        for (var i= 0; i< experienceArray.length ; i++){

            var listItem = $('<div class="projectItem animated slideInDown" data-project-database-id='+experienceArray[i].id+' data-project-id='+i+'>'+'<span class="experienceItemText">'+experienceArray[i].position+'</span>'+'<span class="pull-right editProject pointer"><i class="fa fa-pencil" aria-hidden="true"></i></span><span class="pull-right deleteProject pointer"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>');

            projectsArray[i].editId = i;
            if(projectsArray[i].deleted === false){
                $('.accomplishmentsAndProjectsContainer').append(listItem);
            }

        }

        $('.deleteProject').click(function () {
            // console.log('hi');
            var id = $(this).parent().attr('data-project-id');
            projectsArray[id].deleted = true;

            $(this).parent().remove();
            refreshProjectsListItems(projectsArray);
        });

        $('.editProject').click(function () {
            clearForms();
            $('#addAccomplishmentsAndProjectsForm').show();
            $('#addAccomplishmentsAndProjectsForm').addClass('animated bounceInRight');
            setTimeout(function() { $('#addAccomplishmentsAndProjectsForm').scrollTop(0); }, 300);
            $('#addAccomplishmentsAndProjectsForm').attr('data-isedit',1);
            $('#addAccomplishmentsAndProjectsForm').attr('data-edit-project-id',$(this).parent().attr('data-project-id'));
            $('#addAccomplishmentsAndProjectsForm').attr('data-database-project-id',$(this).parent().attr('data-project-database-id'));

            addCloseEventListener();

            // var id = $(this).parent().attr('data-work-database-id');

            var id =  $(this).parent().attr('data-project-id');

            var experience = $.grep(projectsArray, function(value,i) {

                // console.log(value);

                return parseInt(value.editId) === parseInt(id);
            });

            experience = experience[0];
            $('#projectName').val(experience.position);
            $('#projectUrl').val(experience.webPage);
            $('#projectDescription').val(experience.description);
            $('#projectDateFrom').val(experience.dateFrom);
            $('#projectDateTo').val(experience.dateTo);



        });
    }


    /**
     * Text Area Counter
     *
     */

    $('#summary').keyup(function () {
        var max = 150;
        var newCount = max - $('#summary').val().length;
        $('#textAreaCounter').text(newCount);

    });


});