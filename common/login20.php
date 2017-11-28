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

require_once "style.php";
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

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>eSupport</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>

    <!--Intro Section-->
    <section class="view intro-2 hm-stylish-strong">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

                        <!--Form with header-->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">

                                <!--Header-->
                                <div class="form-header orange-gradient">
                                    <h3><i class="fa fa-user mt-2 mb-2"></i> Casaria eSupport 2.0 </h3>
                                </div>

                                <!--Body-->
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input type="text" id="orangeForm-name" class="form-control">
                                    <label for="orangeForm-name">Your user name</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix white-text"></i>
                                    <input type="password" id="orangeForm-pass" class="form-control">
                                    <label for="orangeForm-pass">Your password</label>
                                </div>

                                <div class="text-center">
                                    <button class="btn orange-gradient btn-lg">LOGIN</button>
                                    <hr>
                                    <div class="inline-ul text-center d-flex justify-content-center">
                                        <a class="icons-sm tw-ic"><i class="fa fa-twitter white-text"></i></a>
                                        <a class="icons-sm li-ic"><i class="fa fa-linkedin white-text"> </i></a>
                                        <a class="icons-sm ins-ic"><i class="fa fa-instagram white-text"> </i></a>
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

