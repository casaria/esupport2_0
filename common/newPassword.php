<?php
/**
 * Created by PhpStorm.
 * User: horra
 * Date: 11/27/2017
 * Time: 6:09 PM
 */
//set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];

//require_once "style.php";
//require_once "config.php";
//require_once "$database.class.php";
//require_once "common.php";

?>


<!--Animations init-->
new WOW().init();

<style>


.intro-2 {
    background: url("https://mdbootstrap.com/img/Photos/Others/img%20(46).jpg")no-repeat center center;
    background-size: cover;
}
.top-nav-collapse {
    background-color: #ff8a65 !important;
}
.navbar:not(.top-nav-collapse) {
    background: transparent !important;
}
@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
        background: #ff8a65 !important;
    }
}
.md-form .prefix {
    font-size: 1.5rem;
    margin-top: 1rem;
}
h6 {
    line-height: 1.7;
}
@media (max-width: 740px) {
    .full-height,
    .full-height body,
    .full-height header,
    .full-height header .view {
        height: 1150px;
    }
}

</style>

<?php

if($enable_helpdesk == 'Off'){
    printerror($on_off_reason);
    exit;
}


?>
<html lang="en" class="full-height">
<HEADER>
<!--Main Navigation-->
<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>MDB</strong></a>
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
        <div class="full-bg-img">
            <div class="container flex-center">
                <div class="d-flex align-items-center">
                    <div class="row flex-center pt-5 mt-3">
                        <div class="col-md-6 text-center text-md-left mb-5">
                            <div class="white-text">
                                <h1 class="display-4 wow fadeInLeft" data-wow-delay="0.3s">Lorem ipsum</h1>
                                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                                <h6 class="wow fadeInLeft" data-wow-delay="0.3s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae, quisquam iste.</h6>
                                <br>
                                <a class="btn peach-gradient wow fadeInLeft" data-wow-delay="0.3s">Learn more</a>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-5 offset-xl-1">
                            <!--Form-->
                            <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                <div class="card-body z-depth-2">
                                    <!--Header-->
                                    <div class="text-center">
                                        <h3>Write to us:</h3>
                                        <hr>
                                    </div>

                                    <!--Body-->
                                    <div class="md-form">
                                        <i class="fa fa-user prefix grey-text"></i>
                                        <input type="text" id="form3" class="form-control">
                                        <label for="form3">Your name</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix grey-text"></i>
                                        <input type="text" id="form2" class="form-control">
                                        <label for="form2">Your email</label>
                                    </div>

                                    <!--Textarea with icon prefix-->
                                    <div class="md-form">
                                        <i class="fa fa-pencil prefix grey-text"></i>
                                        <textarea type="text" id="form8" class="md-textarea"></textarea>
                                        <label for="form8">Your message</label>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn peach-gradient">Send</button>
                                        <hr>
                                        <fieldset class="form-group">
                                            <input type="checkbox" id="checkbox1">
                                            <label for="checkbox1">Subscribe me to the newsletter</label>
                                        </fieldset>
                                    </div>

                                </div>
                            </div>
                            <!--/.Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../mdb/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../mdb/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../mdb/js/mdb.min.js"></script>
</header>
<!--Main Navigation-->




