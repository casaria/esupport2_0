<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eSupport-2 LOGIN</title>


<?php
/*
 * Created by

 */
//set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];

//require_once "style.php";
require_once "config.php";
require_once "$database.class.php";
require_once "common.php";

?>

    <style>
        * {margin: 0; padding: 0;}
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../mdb/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../mdb/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../mdb/css/style.css" rel="stylesheet">

    <style>
        .intro-3 {

            background-image: linear-gradient(rgba(56,35,35, 0.5), rgba(67, 69, 34, 0.9)), url("../img/svg/bg1.png");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .intro-2 {
            background: url("../img/IMG_3629.png")no-repeat center center;
            background-size: cover;
        }

        .top-nav-collapse {
            background-color: #284175 !important;
            /*  background-color: #3f51b5 !important; */
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #32383e !important;
                /*   background: #3f51b5 !important; */
            }
        }

        .card {
            background-color: rgba(73, 60, 78, 0.55);
        }

        .md-form .prefix {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        .md-form label {
            color: #aaaaaa;
        }
        h6 {
            line-height: 1.7;
        }
        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 750px;
            }
        }
        @media (min-width: 741px) and (max-height: 638px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 750px;
            }
        }

        .card {
            margin-top: 30px;
         /*   margin-bottom: 30px; */

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #546;
        }
    </style>

<?php
if($enable_helpdesk == 'Off'){
    printerror($on_off_reason);
    exit;
}
?>

</head>

<body>
<!--Main Navigation-->
    <header>
        <!--Modal: Register Form-->
        <div class="card modal fade" id="newpasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal" role="document">
                <!--Content-->
                <div class="modal-content">

                    <!--Header-->
                    <div class="modal-header orange-gradient darken-3 white-text">
                        <h4 class="title"><i class="fa fa-user-plus"></i> Create Secure Password</h4>
                        <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="false">&times;</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">

                        <div class="row">
                        <div class="md-form grey-text">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="form33" class="form-control validate">
                            <label for="form33" data-error="wrong" data-success="strong">your new password</label>
                        </div>
                        </div>






                        <div class="row">
                        <div class="md-form grey-text">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="form34" class="form-control">
                            <label for="form34">Repeat password</label>
                        </div>
                        </div>

                        <div class="text-center mt-2">
                            <button class="btn btn-elegant btn-deep-orange">Validate<i class="fa fa-sign-in ml-1"></i></button>
                        </div>

                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="options text-center text-md-right mt-1">
                            <p>Already have an account? <a href="#">Log In</a></p>
                        </div>
                        <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!--Modal: Register Form-->



        <!-- Central Modal Medium Info -->
        <div class="modal fade" id="passwordModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Password requirements</p>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-refresh fa-4x mb-3 animated rotateIn"></i>
                            <br>
                            <p>To increase security we now require that all passowrds are at least <strong>8 characters long.</strong></p>
                            <hr>
                            <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case letter, and one symbol!</p>
                            <p><strong>Please do not use names or simple number comnbinations such as 12345! If you neglect secure password principles, your account will sooner or later be compromised! Therefore use strong passwords!</strong></p>If you have not yet changed your password please go to the profile link in the menu and change your password. Thank you!
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Close</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Medium Info-->
        <!-- Central Modal Medium Info -->
        <div class="modal fade" id="securityModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-notify modal-warning" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <p class="heading lead">Why the changes?</p>
                        <h4 class="h3-responsive"></h4>
                        <br>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-question-o fa-4x mb-3 animated rotateIn"></i>
                            <br>
                            <p>To maintain established site sfety standards we recently switched to secure servers with 256 bit encryption (same standard used for online banking). All transactions are now fully end to end encrypted and secure. The <strong>final step to tigthen up security</strong> and discourage brute forcing passwords, is the use of strong passwords.
                            <hr>
                            <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will lockout your site's IP address permanently (This will poterntially lock out all your co-workers from using eSupport as well, until verified and manually reset). Therefore, if your login credentials do not work after a few attempts, please contact us imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <a type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">Close</a>
                    </div>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Medium Info-->

        <!-- Modal -->
        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordModalLabel">Password Guidelines</h5>

                            <div class="col-md-12">
                                <div class="row">
                                    <h4 class="h3-responsive">Password requirements</h4>
                                    <br>
                                    <p>To increase security we now require that all passowrdsa are at least <strong>8 characters long.</strong></p>
                                    <hr>
                                    <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case letter, and one symbol!</p>
                                    <p><strong>Please do not use names or simple number comnbinations such as 12345! Your account will sooner or later be compromised if you neglect secure password principles/strong></p>
                                </div>
                            </div>

                        <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="securityModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="securityModalLabel">Enhanced site security</h5>

                        <div class="col-md-12">
                            <div class="row">
                                <h4 class="h3-responsive">Why the changes?</h4>
                                <br>

                                <p>To maintain established site sfety standards we recently switched to secure servers with 256 bit encryption (same standard used for online banking). All transactions are now fully end to end encrypted and secure. The <strong>final step to tigthen up security</strong> and discourage brute forcing passwords, is the use of strong passwords.
                                <hr>
                                <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will lockout your site's IP address permanently (This will poterntially lock out all your co-workers from using eSupport as well, until verified and manually reset). Therefore, if your login credentials do not work after a few attempts, please contact us imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
                            </div>
                        </div>
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>eSupport 2.0</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#securityModalInfo">Security information <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModalInfo">password guidelines</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#newpasswordModal">Create secure password</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Intro Section-->
    <section class="view intro-2 hm-indigo-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                        <!--Form with header-->
                        <div class="card wow zoomIn" data-wow-delay="0.7s">
                            <div class="card-body z-depth-4">

                                <!--Header-->
                                <div class="form-header orange-gradient">
                                    <h5><i class="fa fa-user-secret mt-2 mb-2"></i> Casaria eSupport 2.0 </h5>
                                </div>

                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input type="text" id="orangeForm-name" name="user" class="form-control">
                                    <label for="orangeForm-name">Your user name</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input type="password" id="orangeForm-pass" name="password" class="form-control">
                                    <label for="orangeForm-pass">Your password</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn orange-gradient btn-lg">LOGIN</button>
                                    <hr>
                                    <div class="inline-ul text-center d-flex justify-content-center">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/Form with header-->

                    </div>
                </div>
            </div>
        </div>
    </section>

    </header>
<!--Main Navigation-->


<!-- SCRIPTS -->
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../mdb/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
<script>
    new WOW().init();
</script>
</body>
</html>

