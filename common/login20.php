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
            color: #ffffff;
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
            color: #fff;
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

        <!-- Modal -->
        <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passordModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="jumbotron text-center">
                                        <h1 class="h3-responsive">Premium Bootstrap Templates &amp; Themes</h1>
                                        <br>

                                        <p>Have a look at our collection of advanced and stunning Bootstrap themes. <strong>Each of the pack contains dozens of premium templates</strong></p>
                                        <hr>
                                        <p>Or maybe you prefer to create templates on your own? Get our powerful <strong>Material Design UI KIT for Bootstrap</strong></p>
                                        <a id="templates-jumbotron-mdb" href="https://mdbootstrap.com/product/material-design-for-bootstrap-pro/" class="btn btn-dtc waves-effect waves-light">Material Design for Bootstrap <i class="fa fa-diamond right"></i></a>
                                    </div>

                                </div>
                            </div>


                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                        <a class="nav-link" href="#">Security information <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#passwordModal">password guidelines</a>
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

