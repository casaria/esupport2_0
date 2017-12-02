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
    require_once "config.php";
    //set the start time so we can calculate how long it takes to load the page.
    $mtime1 = explode(" ", microtime());
    $starttime = $mtime1[0] + $mtime1[1];
    //$normalized_username ='';
    //$normalized_password ='';
    //$normalized_referer ='';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/common/config.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/common/$database.class.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/common/common.php";
    /** @noinspection PhpIncludeInspection */
    require_once $_SERVER['DOCUMENT_ROOT'] . "/lang/$default_language.lang.php";


    $cookie_name = strtolower($_SESSION['cookie_name']);
    $normalized_username = strtolower(trim($_POST['user']));
    $normalized_password = trim($_POST['password']);

    session_commit() === PHP_SESSION_ACTIVE ? $cookieuser = '' : startSession();

    /*  Not a good ides7
     *  trim ($_POST['password'],"((?=^)(\s*))|((\s*)(?>$))"); *
     */
    $normalized_referer = strtolower(trim($HTTP_REFERER));

    function setUserCookie()
    {
        global $normalized_username, $normalized_password, $session_time;
        $cookie_name = $normalized_username;
//session_register ("cookie_name");
        $_SESSION ['cookie_name'] = $cookie_name;
        $enc_pwd = md5($normalized_password);
//session_register ("enc_pwd");
        $_SESSION ['enc_pwd'] = $enc_pwd;

//nov14 header("Location: $referer");
//echo"<BR>$cookie_name $enc_pwd";
        setcookie('cookieuser', $cookie_name, time() + $session_time);
        setcookie('cookiepwd', $normalized_password, time() + $session_time);
    }

    function setSupporterCookie()
    {
        global $normalized_username, $normalized_password, $session_time;
        $cookie_name = $normalized_username;

        //session_register("cookie_name");
        $_SESSION ["cookie_name"] = $cookie_name;
        $enc_pwd = md5($normalized_password);
        //session_register("enc_pwd");
        $_SESSION ["enc_pwd"] = $enc_pwd;

        //nov14 header("Location: $referer");
        setcookie('supporter_usercookie', $cookie_name, time() + $session_time);
        setcookie('supporter_pwdcookie', $normalized_password, time() + $session_time);
    }

    ?>

    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../mdb/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../mdb/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../mdb/css/style.css" rel="stylesheet">


    <style>
        .intro-1 {
            background: url("../img/svg/bg1.png") no-repeat, linear-gradient(rgba(63, 81, 181, 0.5), rgba(67, 20, 34, 0.9)) !important;
            background-size: cover;
        }

        .intro-2 {
            background: background: -moz-linear-gradient(top, rgba(30, 27, 107, 1) 0%, rgba(44, 178, 158, 1) 47%, rgba(44, 178, 158, 1) 53%, rgba(255, 197, 112, 1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(30, 27, 107, 1) 0%, rgba(44, 178, 158, 1) 47%, rgba(44, 178, 158, 1) 53%, rgba(255, 197, 112, 1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(30, 27, 107, 1) 0%, rgba(44, 178, 158, 1) 47%, rgba(44, 178, 158, 1) 53%, rgba(255, 197, 112, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e1b6b', endColorstr='#ffc570', GradientType=0); /* IE6-9 */;
            background-size: cover;
        }

        .intro-3 {
            background: url("../img/IMG_3629.png") no-repeat center center;
            background-size: cover;
        }

        .intro-4 {
            background: url("../img/wormhole.png") no-repeat center center;
            background-size: cover;
        }

        .intro-5 {
            background: url("../img/wave55.jpg") no-repeat center center;
            background-size: cover;
        }

        .intro-6 {
            background: url("../img/wormholke.jpg") no-repeat center center;
            background-size: cover;
        }

        .intro-7 {
            background: rgb(30, 27, 107); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(30, 27, 107, 1) 0%, rgba(116, 56, 137, 1) 47%, rgba(136, 44, 178, 1) 53%, rgba(255, 197, 112, 1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(30, 27, 107, 1) 0%, rgba(116, 56, 137, 1) 47%, rgba(136, 44, 178, 1) 53%, rgba(255, 197, 112, 1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(30, 27, 107, 1) 0%, rgba(116, 56, 137, 1) 47%, rgba(136, 44, 178, 1) 53%, rgba(255, 197, 112, 1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#1e1b6b', endColorstr='#ffc570', GradientType=0); /* IE6-9 */
        }

        .intro-8 {
            background: url("../img/KTMduke.jpg") no-repeat center center;
            background-size: cover;
        }

        .intro-9 {
            background: url("../img/mountains.jpg") no-repeat center center;
            background-size: cover;
        }

        .intro-10 {
            background: url("../img/chicago.jpg") no-repeat center center;
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
                background-color: #3f51b5 !important;
                /*   background: #3f51b5 !important; */
            }
        }

        .card {
            background-color: rgba(124, 124, 122, 0.65);
        }

        .md-form .prefix {
            font-size: 1.7rem;
            margin-top: 1rem;
        }

        .md-form label {
            color: #ffffff;
        }

        h6 {
            line-height: 1.9;
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
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }

        .md-form input[type=text]:focus:not([readonly]) + label,
        .md-form input[type=password]:focus:not([readonly]) + label {
            color: #8EDEF8;
        }

    </style>


    <?php
    if ($enable_helpdesk == 'Off') {
        printerror($on_off_reason);
        exit;
    } ?>
    </head>
<!--Modal: new Password Form-->
<div class="card modal fade" id="newpasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog cascading-modal   col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5"
         role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header orange-gradient darken-3  ">
                <h4 class="title"><i class="fa fa-user-plus"></i> Create Secure Password</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form action="" role="form" id="newPassForm" name="newPassForm" novalidate>
                    <div id="gendererror"></div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" id="form31" name="pass1" class="form-control">
                        <label for="form31" class="active">Your current password</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="pass2" id="form32" class="form-control">
                        <label for="form32" class="active">New password</label>
                    </div>
                    <div class="md-form form-sm">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="pass3" id="form33" class="form-control">
                        <label for="form33" class="active">Repeat New password</label>
                    </div>
                    <div class="text-center mt-2">
                        <button type="submit" id="validate" class="btn peach-gradient btn-rounded">Validate<i
                                    class="fa fa-sign-in ml-1"></i></button>

                        <a class="btn blue-gradient btn-rounded"><i class="fa fa-bolt"></i></a>
                    </div>
                </form>

            </div>
            <!--Footer-->
            <div class="modal-footer">
                <div id="response" class="options text-center text-md-right mt-1">
                    <p>Enter a new PWD</p>
                </div>

                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close
                </button>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Register Form-->


<!-- Central Modal Medium Info -->
<div class="modal fade" id="passwordModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
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
                    <p>To increase security we now require that all passowrds are at least <strong>8 characters
                            long.</strong></p>
                    <hr>
                    <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case
                        letter, and one symbol!</p>
                    <p><strong>Please do not use names or simple number comnbinations such as 12345! If you neglect
                            secure password principles, your account will sooner or later be compromised! Therefore
                            use strong passwords!</strong></p>If you have not yet changed your password please go to
                    the profile link in the menu and change your password. Thank you!
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
<div class="modal fade" id="securityModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Why the changes?</p>
                <h4 class="h3-responsive"></h4>
                <!--Modal: new Password Form-->
                <div class="card modal fade" id="newpasswordModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog cascading-modal   col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5"
                         role="document">
                        <!--Content-->
                        <div class="modal-content">

                            <!--Header-->
                            <div class="modal-header orange-gradient darken-3  ">
                                <h4 class="title"><i class="fa fa-user-plus"></i> Create Secure Password</h4>
                                <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <!--Body-->
                            <div class="modal-body">
                                <form action="" role="form" id="newPassForm" name="newPassForm" novalidate>
                                    <div id="gendererror"></div>
                                    <div class="md-form form-sm">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" id="form31" name="pass1" class="form-control">
                                        <label for="form31" class="active">Your current password</label>
                                    </div>
                                    <div class="md-form form-sm">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" name="pass2" id="form32" class="form-control">
                                        <label for="form32" class="active">New password</label>
                                    </div>
                                    <div class="md-form form-sm">
                                        <i class="fa fa-lock prefix"></i>
                                        <input type="password" name="pass3" id="form33" class="form-control">
                                        <label for="form33" class="active">Repeat New password</label>
                                    </div>
                                    <div class="text-center mt-2">
                                        <button type="submit" id="validate" class="btn peach-gradient btn-rounded">Validate<i
                                                    class="fa fa-sign-in ml-1"></i></button>

                                        <a class="btn blue-gradient btn-rounded"><i class="fa fa-bolt"></i></a>
                                    </div>
                                </form>

                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <div id="response" class="options text-center text-md-right mt-1">
                                    <p>Enter a new PWD</p>
                                </div>

                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close
                                </button>
                            </div>

                        </div>
                        <!--/.Content-->
                    </div>
                </div>
                <!--Modal: Register Form-->


                <!-- Central Modal Medium Info -->
                <div class="modal fade" id="passwordModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
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
                                    <p>To increase security we now require that all passowrds are at least <strong>8 characters
                                            long.</strong></p>
                                    <hr>
                                    <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower case
                                        letter, and one symbol!</p>
                                    <p><strong>Please do not use names or simple number comnbinations such as 12345! If you neglect
                                            secure password principles, your account will sooner or later be compromised! Therefore
                                            use strong passwords!</strong></p>If you have not yet changed your password please go to
                                    the profile link in the menu and change your password. Thank you!
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
                <div class="modal fade" id="securityModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                     aria-hidden="true">
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
                                    <p>To maintain established site sfety standards we recently switched to secure servers with 256
                                        bit encryption (same standard used for online banking). All transactions are now fully end
                                        to end encrypted and secure. The <strong>final step to tigthen up security</strong> and
                                        discourage brute forcing passwords, is the use of strong passwords.
                                    <hr>
                                    <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will
                                        lockout your site IP address permanently (This will poterntially lock out all your
                                        co-workers from using eSupport as well, until verified and manually reset). Therefore, if
                                        your login credentials do not work after a few attempts, please contact us imemdiately and
                                        do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
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
                <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="passwordModalLabel">Password Guidelines</h5>

                                <div class="col-md-12">
                                    <div class="row">
                                        <h4 class="h3-responsive">Password requirements</h4>
                                        <br>
                                        <p>To increase security we now require that all passowrdsa are at least <strong>8 characters
                                                long.</strong></p>
                                        <hr>
                                        <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower
                                            case letter, and one symbol!</p>
                                        <p><strong>Please do not use names or simple number comnbinations such as 12345! Your
                                                account will sooner or later be compromised if you neglect secure password
                                                principles/strong></p>
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
                <div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="securityModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="securityModalLabel">Enhanced site security</h5>

                                <div class="col-md-12">
                                    <div class="row">
                                        <h4 class="h3-responsive">Why the changes?</h4>
                                        <br>

                                        <p>To maintain established site sfety standards we recently switched to secure servers with
                                            256 bit encryption (same standard used for online banking). All transactions are now
                                            fully end to end encrypted and secure. The <strong>final step to tigthen up
                                                security</strong> and discourage brute forcing passwords, is the use of strong
                                            passwords.
                                        <hr>
                                        <p>Finally, we also monitor login attempts and multiple successive, failed login attempts
                                            will lockout your site IP address permanently (This will poterntially lock out all
                                            your co-workers from using eSupport as well, until verified and manually reset).
                                            Therefore, if your login credentials do not work after a few attempts, please contact us
                                            imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!
                                        </p>
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
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                                aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#securityModalInfo">Security
                                        information <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModalInfo">password
                                        guidelines</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#newpasswordModal">Create secure
                                        password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!--Intro Section-->
                <section class="view intro-9 hm-indigo-light">
                    <div class="full-bg-img flex-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                                    <form method="post" role="form" id="newPassForm" name="newPassForm">
                                        <!--Form with header-->
                                        <div class="card wow zoomIn" data-wow-delay="0.7s">
                                            <div class="card-body z-depth-4">

                                                <!--Header-->
                                                <div class="form-header orange-gradient">
                                                    <h4><i class="fa fa-user-secret mt-3 mb-3"></i> Casaria eSupport 2.0 login</h4>
                                                </div>

                                                <!--Body-->
                                                <div class="md-form">
                                                    <i class="fa fa-user prefix white-text"></i>
                                                    <input type="text" id="form1" name="user" class="form-control">
                                                    <label for="form1">Your user name</label>
                                                </div>

                                                <div class="md-form">
                                                    <i class="fa fa-lock prefix white-text"></i>
                                                    <input type="password" id="form2" name="password" class="form-control">
                                                    <label for="form2">Your password</label>
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" name="login" class="btn orange-gradient btn-lg">LOGIN
                                                    </button>
                                                    <hr>
                                                    <div class="inline-ul text-center d-flex justify-content-center">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--/Form with header-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- SCRIPTS -->


                <!-- JQuery -->
                <script type="text/javascript" src="../mdb/js/jquery-3.2.1.js"></script>
                <!-- Bootstrap tooltips -->
                <script type="text/javascript" src="../mdb/js/popper.min.js"></script>
                <!-- Bootstrap core JavaScript -->
                <script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
                <!-- MDB core JavaScript    +++   mdb.min -->
                <script type="text/javascript" src="../mdb/js/mdb.js"></script>

                <script type="text/javascript"
                        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
                <!-- SCRIPTS -->
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
                    <p>To maintain established site sfety standards we recently switched to secure servers with 256
                        bit encryption (same standard used for online banking). All transactions are now fully end
                        to end encrypted and secure. The <strong>final step to tigthen up security</strong> and
                        discourage brute forcing passwords, is the use of strong passwords.
                    <hr>
                    <p>Finally, we also monitor login attempts and multiple successive, failed login attempts will
                        lockout your site IP address permanently (This will poterntially lock out all your
                        co-workers from using eSupport as well, until verified and manually reset). Therefore, if
                        your login credentials do not work after a few attempts, please contact us imemdiately and
                        do not retry exessively until your IP becomes blacklisted.<br>Thank you!</p>
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
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Password Guidelines</h5>

                <div class="col-md-12">
                    <div class="row">
                        <h4 class="h3-responsive">Password requirements</h4>
                        <br>
                        <p>To increase security we now require that all passowrdsa are at least <strong>8 characters
                                long.</strong></p>
                        <hr>
                        <p>Passwords must contain letters &amp; numbers, at least one upper case letter, one lower
                            case letter, and one symbol!</p>
                        <p><strong>Please do not use names or simple number comnbinations such as 12345! Your
                                account will sooner or later be compromised if you neglect secure password
                                principles/strong></p>
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
<div class="modal fade" id="securityModal" tabindex="-1" role="dialog" aria-labelledby="securityModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="securityModalLabel">Enhanced site security</h5>

                <div class="col-md-12">
                    <div class="row">
                        <h4 class="h3-responsive">Why the changes?</h4>
                        <br>

                        <p>To maintain established site sfety standards we recently switched to secure servers with
                            256 bit encryption (same standard used for online banking). All transactions are now
                            fully end to end encrypted and secure. The <strong>final step to tigthen up
                                security</strong> and discourage brute forcing passwords, is the use of strong
                            passwords.
                        <hr>
                        <p>Finally, we also monitor login attempts and multiple successive, failed login attempts
                            will lockout your site IP address permanently (This will poterntially lock out all
                            your co-workers from using eSupport as well, until verified and manually reset).
                            Therefore, if your login credentials do not work after a few attempts, please contact us
                            imemdiately and do not retry exessively until your IP becomes blacklisted.<br>Thank you!
                        </p>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#securityModalInfo">Security
                        information <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModalInfo">password
                        guidelines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#newpasswordModal">Create secure
                        password</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<!--Intro Section-->
<section class="view intro-9 hm-indigo-light">
    <div class="full-bg-img flex-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">
                    <form method="post" role="form" id="newPassForm" name="newPassForm">
                        <!--Form with header-->
                        <div class="card wow zoomIn" data-wow-delay="0.7s">
                            <div class="card-body z-depth-4">

                                <!--Header-->
                                <div class="form-header orange-gradient">
                                    <h4><i class="fa fa-user-secret mt-3 mb-3"></i> Casaria eSupport 2.0 login</h4>
                                </div>

                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input type="text" id="form1" name="user" class="form-control">
                                    <label for="form1">Your user name</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input type="password" id="form2" name="password" class="form-control">
                                    <label for="form2">Your password</label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="login" class="btn orange-gradient btn-lg">LOGIN
                                    </button>
                                    <hr>
                                    <div class="inline-ul text-center d-flex justify-content-center">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/Form with header-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- SCRIPTS -->


<!-- JQuery -->
<script type="text/javascript" src="../mdb/js/jquery-3.2.1.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../mdb/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript    +++   mdb.min -->
<script type="text/javascript" src="../mdb/js/mdb.js"></script>

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<!-- SCRIPTS -->


    <script>
        new WOW().init();
    </script>
    <!--suppress JSUnusedGlobalSymbols, JSUnusedGlobalSymbols -->
    <script type="text/javascript">

        jQuery.validator.addMethod("require_from_group", function (value, element, options) {
            let $fields = jQuery(options[1], element.form),
                $fieldsFirst = $fields.eq(0),
                validator = $fieldsFirst.data('valid_req_grp') ? $fieldsFirst.data('valid_req_grp') : jQuery.extend({}, this),
                isValid = $fields.filter(function () {
                    return validator.elementValue(this);
                }).length >= options[0];

            // Store the cloned validator for future validation
            $fieldsFirst.data('valid_req_grp', validator);
            // If element isn't being validated, run each require_from_group field's validation rules
            if (!jQuery(element).data('being_validated')) {
                $fields.data('being_validated', true);
                $fields.each(function () {
                    validator.element(this);
                });
                $fields.data('being_validated', false);
            }
            return isValid;
        }, "Please fill ALL of these fields.");

        // Require old password when setting new one.

        jQuery.validator.addMethod("old_pass_if_changing", function (value, element, options) {
            let oldpass = jQuery(options[0]);
            let newpass = jQuery(options[1]);
            return (!oldpass.val() && newpass.val()) //return true or falsse

        }, "Old password must be supplied when setting new one.");

        jQuery.validator.addMethod("notEqual", function (value, element, param) {
            return this.optional(element) || (value !== param);
        }, "New Password cannot be the same as current.");


        jQuery.validator.addMethod("validpassword", function (value, element) {
            return this.optional(element) ||
                /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(value);
        }, "Password must contain a minimum of 1 lower case letter," +
            " 1 upper case letter, 1 numeric and 1 special character.");


        // Wait for the DOM to be ready

        $("form[name='newPassForm']").validate
        ({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                form31: {
                    required: true,
                    minlength: 2,
                    maxlength: 20,
                    validpassword: false

                },
                form32: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    validpassword: true,
                    notEqual: "#pass1"
                },
                form33: {
                    required: true,
                    minlength: 8,
                    maxlength: 20,
                    validpassword: true,
                    equalTo: "#pass2"
                }

            }
            // Specify validation error messages
            /* messages: {
                     form33: {
                         required: "Please provide a password",
                         minlength: "Password must be at least 5 characters"
                     },
                     form34: {
                         required: "Please repeat  the password",
                         minlength: "Password must be at least 5 characters"
                     }
             }, */
        });
        // Set jQuery.validate settings for bootstrap integration
        jQuery.validator.setDefaults({
            highlight: function (element) {
                jQuery(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function (element) {
                jQuery(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'label label-danger',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });

    </script>

<body>
<!--Main Navigation-->
<header>

    <?php
    //if submit has been hit, set the cookie and reload the page immediately so the cookie takes effect.
    if (isset($login)) {
        //if admin is contained in the url, we need to make sure the user is an
        //admin before letting them login.
        if ($$cookie_name == '') {
            $cookie_name = $normalized_username;
        }
        if (ereg("/admin", $normalized_referer)) {
            //check the user name and password against the database.
            if (checkUser($normalized_username, md5($normalized_password))) {
                if (isAdministrator($normalized_username)) {

                    //session_register ("cookie_name");
                    $_SESSION ["cookie_name"] = $cookie_name;
                    $enc_pwd = md5($normalized_password);
                    //session_register ("enc_pwd");
                    $_SESSION ["enc_pwd"] = $enc_pwd;

                    //nov14 header("Location: $referer");
                } else {

                    echo $lang_notadmin;
                    exit;
                }
            } else {
                echo $lang_wronglogin;
                exit;
            }

        } elseif ((ereg("/supporter", $normalized_referer))) {
            //check the user name and password against the database.
            if (checkUser($normalized_username, md5($normalized_password))) {
                if (isSupporter($normalized_username)) {
                    setSupporterCookie();
                } else {
                    setUserCookie();
                    header("location:../index.php");
                    echo $lang_notsupporter;
                    exit;
                }
            } else {
                echo $lang_wronglogin;
                exit;
            }

        } //otherwise, the user is not logging in to the admin site.
        else {
            //check the user name and password against the database.
            if (checkUser($normalized_username, md5($normalized_password))) {
                if (isSupporter($normalized_username)) {
                    setSupporterCookie();
                    header("location:supporter/index.php");
                }
                setUserCookie();
            } else {
                echo $lang_wronglogin;
                exit;
            }
        }

    }

    //check the cookie first.
    if (!isSet($_SESSION ['cookie_name']))
    {
        if (eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF))
            $sup = 1;
        else
            $sup = 0;

        if (isset($_COOKIE['supporter_usercookie']))
            $cookie_name = $_COOKIE['supporter_usercookie'];
        if (isset($_COOKIE['supporter_pwdcookie']))
            $cookiepwd = $_COOKIE['supporter_pwdcookie'];


        echo
        '<script language="JavaScript">
            function setfocus(){
                document.login.user.focus();
              } 
         </script>';




    }
    else {  //Cookie was set

        //if submit has not been pressed, check the cookie against the database.

        if (preg_match("/admin/i", $PHP_SELF) && !isAdministrator($cookie_name) && $cookie_name !=

            '') {
            echo "$lang_notadmin";
            exit;
        }

    }
    //get some globals about the user
    if ($cookie_name != '') {
        $user_id = getUserId($cookie_name);
        $ugID_list = getUsersGroupIDList($user_id);

    } else {
        echo $lang_wronglogin;
        exit;
    }
    //this returns back to the page that called it.
    ?>


</header>
<!--Main Navigation-->


</body>
</html>

