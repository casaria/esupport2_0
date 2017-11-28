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
<?php
//set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];
$normalized_username ='';
$normalized_password ='';
$normalized_referer ='';
require_once  $_SERVER['DOCUMENT_ROOT']."/common/common.php";


require_once $_SERVER['DOCUMENT_ROOT']."/lang/$default_language.lang.php";
$login_logo = "../images/casariadefault/small-header-brown.gif";

$cookieuser = '';
//common.php
session_status() === PHP_SESSION_ACTIVE  ? $cookieuser == '' : startSession();

$cookie_name = strtolower($_SESSION['cookie_name']);
$normalized_username  = strtolower (trim($_POST['user']));
$normalized_password = trim($_POST['password']);
/*  Not a good ides
 *  trim ($_POST['password'],"((?=^)(\s*))|((\s*)(?>$))"); *
 */
$normalized_referer = strtolower (trim($HTTP_REFERER));
//echo "cookie_name = $cookie_name <br>";
//echo "session ID =" . session_id(). " <br>";
//if submit has been hit, set the cookie and reload the page immediately so the cookie takes effect.
if(isset($login))
{
    //if admin is contained in the url, we need to make sure the user is an
    //admin before letting them login.
    if ($$cookie_name=='')  {$cookie_name= $normalized_username;}
    if(ereg("/admin", $normalized_referer)){
        //check the user name and password against the database.
        if(checkUser($normalized_username, md5($normalized_password))){
            if(isAdministrator($normalized_username)){

                //session_register ("cookie_name");
                $_SESSION ["cookie_name"] = $cookie_name;
                $enc_pwd = md5($normalized_password);
                //session_register ("enc_pwd");
                $_SESSION ["enc_pwd"] = $enc_pwd;

                //nov14 header("Location: $referer");
            }
            else{
                echo $lang_notadmin;
                exit;
            }
        }
        else{
            echo $lang_wronglogin;
            exit;
        }

    }

    elseif ( (ereg("/supporter", $normalized_referer))  ){
        //check the user name and password against the database.
        if(checkUser($normalized_username, md5($normalized_password))){
            if(isSupporter($normalized_username)){
                $cookie_name = $normalized_username;
                $userIsSupporter = true;
                //session_register("cookie_name");
                $_SESSION ["cookie_name"] = $cookie_name;
                $enc_pwd = md5($normalized_password);
                //session_register("enc_pwd");
                $_SESSION ["enc_pwd"] = $enc_pwd;

                //nov14 header("Location: $referer");
                setcookie('supporter_usercookie', $cookie_name,  time()+ $session_time);
                setcookie('supporter_pwdcookie', $normalized_password,  time()+ $session_time);

            }
            else{
                echo $lang_notsupporter;
                exit;
            }
        }
        else{
            echo $lang_wronglogin;
            exit;
        }

    }

    //otherwise, the user is not logging in to the admin site.
    else{
        //check the user name and password against the database.
        if(checkUser($normalized_username, md5($normalized_password))){
            if(isSupporter($normalized_username))




                $cookie_name = $normalized_username;
            //session_register ("cookie_name");
            $_SESSION ['cookie_name'] = $cookie_name;
            $enc_pwd = md5($normalized_password);
            //session_register ("enc_pwd");
            $_SESSION ['enc_pwd'] = $enc_pwd;

            //nov14 header("Location: $referer");
            //echo"<BR>$cookie_name $enc_pwd";
            setcookie('cookieuser', $cookie_name,  time()+ $session_time);
            setcookie('cookiepwd', $normalized_password,  time()+ $session_time);
        }
        else{
            echo $lang_wronglogin;
            exit;
        }
    }

}

//check the cookie first.
if(!isSet($_SESSION ['cookie_name'])) {
if (eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF))
    $sup = 1;
else
    $sup = 0;

require_once $includePath . "style.php";
if (isset($_COOKIE['supporter_usercookie']))
    $cookie_name = $_COOKIE['supporter_usercookie'];
if (isset($_COOKIE['supporter_pwdcookie']))
    $cookiepwd = $_COOKIE['supporter_pwdcookie'];


echo
'<script language="JavaScript">
	function setfocus(){
		document.login.user.focus();
	} </script>';


?>
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
<?php

if(eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF))
    require "../common/footer.php";
else
    require "common/footer.php";

exit;

}
else{  //Cookie was set

    //if submit has not been pressed, check the cookie against the database.

    if(preg_match("/admin/i", $PHP_SELF) && !isAdministrator($cookie_name) && $cookie_name !=

        ''){
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

