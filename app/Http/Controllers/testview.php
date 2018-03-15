
<!DOCTYPE html>
<html lang="eng">
<head>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->




    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="http://127.0.0.1:8000/css/font-awesome-4.7.0/css/font-awesome.css"/>

    <link rel="stylesheet" href="http://127.0.0.1:8000/EasyAutocomplete-1.3.5/easy-autocomplete.css" />
    <meta name="csrf-token" content="5cFpMQ2BO84qfHm1OIPOd1nZaZsbdva4jjYioRXg" />
    <script src="http://127.0.0.1:8000/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js"></script>
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css"/>

    <link rel="stylesheet" href="http://127.0.0.1:8000/css/profile/leftSection.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/profile/rightSection.css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/css/profile/header.css" />


    <link rel="stylesheet" href="http://127.0.0.1:8000/EasyAutocomplete-1.3.5/easy-autocomplete.css" />
    <meta name="csrf-token" content="5cFpMQ2BO84qfHm1OIPOd1nZaZsbdva4jjYioRXg" />
    <script src="http://127.0.0.1:8000/EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js"></script>


    <script src="http://127.0.0.1:8000/js/jquery.tinycolorpicker.js"></script>


</head>



<body>



<div id="pdfContent">



    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12 p-0">
                <div class="profile-header d-flex-center" style="background-color: #C3124B">
                    <i class="fa fa-quote-left fa-5x quote-left" aria-hidden="true"></i>
                    <div class="profile-header-text text-center" id="profileHeaderText">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus eligendi expedita harum iure laborum qui! Eius iste iure quas .
                    </div>
                    <i class="fa fa-quote-right fa-5x quote-right" aria-hidden="true"></i>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="profileHeaderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add your best advice</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <textarea id="profileHeaderModalText" class="form-control" rows="10" maxlength="150"></textarea>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="profileHeaderSave" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="http://127.0.0.1:8000/js/profileHeader.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-1">
                <div class="profile-card-container d-flex-center flex-direction-column">
                    <div class="profile-image-container"
                    ></div>

                    <div class="profile-icons-container d-flex-center pointer">
                        <div class="d-flex-center flex-direction-column m-1 icon-container">
                            <a href="#"><i class="fa fa-check fa-2x" style="color: #C3124B; margin-right: 0"></i></a>
                            <p>Full Time</p>

                        </div>

                        <div class="d-flex-center flex-direction-column m-1 icon-container">
                            <a href="#"><i class="fa fa-close fa-2x" style="color: #C3124B; margin-right: 0"></i></a>
                            <p>Part Time</p>
                        </div>

                        <div class="d-flex-center flex-direction-column m-1 icon-container">
                            <a href="#"><i class="fa fa-check fa-2x" style="color: #C3124B; margin-right: 0"></i></a>
                            <p>Freelance</p>
                        </div>


                    </div>


                    <div class="profile-skills-container">
                        <div class="top-three-skills">
                            <p>Top 3 Skills :</p>

                            <p style="background-color: #C3124B; color: white">PHP</p>
                            <p style="background-color: #C3124B; color: white">AngularJS</p>
                            <p style="background-color: #C3124B; color: white">Swift</p>
                        </div>

                        <div class="additional-skills">
                            <p>Additional Skills :</p>

                        </div>
                    </div>

                    <div class="social-icons-container d-flex-start flex-direction-column pointer" id="socialMedia">

                        <a  href=""><i class="fa fa-facebook"  style="background-color: #C3124B" aria-hidden="true"></i><span style="margin-left: 2em; color: #C3124B"></span></a>
                        <a  href=""><i class="fa fa-twitter"  style="background-color: #C3124B" aria-hidden="true"></i><span style="margin-left: 2em; color: #C3124B"></span></a>
                        <a  href=""><i class="fa fa-dribbble"  style="background-color: #C3124B" aria-hidden="true"></i><span style="margin-left: 2em; color: #C3124B"></span></a>
                        <a  href=""><i class="fa fa-linkedin"  style="background-color: #C3124B" aria-hidden="true"></i><span style="margin-left: 2em; color: #C3124B"></span></a>
                        <a  href=""><i class="fa fa-github"  style="background-color: #C3124B" aria-hidden="true"></i><span style="margin-left: 2em; color: #C3124B"></span></a>
                    </div>

                    <div style="background-color: #C3124B" class="profile-text-container">
                        <div class="question-mark-container d-flex-center">
                            <div class="question-mark"></div>

                        </div>
                        <h4 class="pointer" id="bestAdvice">What's the best advice you've heard recently?</h4>
                        <p>aKJ V</p>

                    </div>
                </div>






                <!-- Modal -->
            </div>

            <div class="col-md-6">


                <div class="infoContainer">

                    <h2 class="text-uppercase p-1">Aleksandar Trajkovski</h2>
                    <i  class="fa fa-pencil fa-2x pointer " id="editUserInfo" aria-hidden="true"></i>
                    <h4>Lorem ipsum dolor sit amet</h4>
                    <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i><span>Aracinovo</span></div>
                    <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i><span></span></div>
                    <div class="d-flex-center justify-flex-start p-1"><i class="fa fa-suitcase fa-2x" aria-hidden="true"></i><span></span></div>
                    <div class="btn btn-default messageButton"><i class="fa fa-envelope" aria-hidden="true"></i>
                        Message</div>

                </div>

                <div class="experienceContainer">
                    <div class="d-flex-center experienceContainerIconContainer">

                        <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: #C3124B; border-radius: 50%; border: 5px solid white"><i class="fa fa-suitcase fa-2x text-white" style="margin-right: 0"></i></div>
                    </div>
                    <h4 class="text-center m-top-bottom-2 experienceType">Android at <span style="font-weight: 700 " class="company">bskjvd</span></h4>
                    <div class="projectContainer" >
                        <h5 style="font-weight: 700" ><i class="fa fa-folder fa-2x" aria-hidden="true"></i>Project</h5>
                        <p class="m-top-bottom-2 projectName p-left-1 text-muted " data-id="9">kgu.</p>
                        <p class="projectInfo">vkjl</p>
                    </div>
                </div>

                <div class="experienceContainer">
                    <div class="d-flex-center experienceContainerIconContainer">

                        <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: #C3124B; border-radius: 50%; border: 5px solid white"><i class="fa fa-suitcase fa-2x text-white" style="margin-right: 0"></i></div>
                    </div>
                    <h4 class="text-center m-top-bottom-2 experienceType">Android at <span style="font-weight: 700 " class="company">vvkhvh</span></h4>
                    <div class="projectContainer" >
                        <h5 style="font-weight: 700" ><i class="fa fa-folder fa-2x" aria-hidden="true"></i>Project</h5>
                        <p class="m-top-bottom-2 projectName p-left-1 text-muted " data-id="10">kjdvskj</p>
                        <p class="projectInfo">bkjbvw d</p>
                    </div>
                    <div class="projectContainer" >
                        <h5 style="font-weight: 700" ><i class="fa fa-folder fa-2x" aria-hidden="true"></i>Project</h5>
                        <p class="m-top-bottom-2 projectName p-left-1 text-muted " data-id="11">pdnp</p>
                        <p class="projectInfo">wkn;lbs;r</p>
                    </div>
                </div>

                <div class="experienceContainer">
                    <div class="d-flex-center experienceContainerIconContainer">

                        <div class="experienceContainerIcon d-flex-center" style="height: 5em; width: 5em; background-color: #C3124B; border-radius: 50%; border: 5px solid white"><i class="fa fa-suitcase fa-2x text-white" style="margin-right: 0"></i></div>
                    </div>
                    <h4 class="text-center m-top-bottom-2 experienceType">Web Development at <span style="font-weight: 700 " class="company">dlkbng</span></h4>
                    <div class="projectContainer" >
                        <h5 style="font-weight: 700" ><i class="fa fa-folder fa-2x" aria-hidden="true"></i>Project</h5>
                        <p class="m-top-bottom-2 projectName p-left-1 text-muted " data-id="12">kvjb k.</p>
                        <p class="projectInfo">khkjvk</p>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>





</body>
</html>
