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
require_once  $_SERVER['DOCUMENT_ROOT']."/common/config.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/common/$database.class.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/common/common.php";
/** @noinspection PhpIncludeInspection */
require_once $_SERVER['DOCUMENT_ROOT']."/lang/$default_language.lang.php";

$cookie_name = strtolower($_SESSION['cookie_name']);
if ($cookie_name !== '') {
    $normalized_username = strtolower(trim($cookie_name));
    $enc_pwd = ($_SESSION['enc_pwd']);
} else {
    $normalized_username = strtolower(trim($_POST['user']));
    $normalized_password = trim($_POST['password']);
}


session_status() === PHP_SESSION_ACTIVE  ? $cookieuser = '' : startSession();


$normalized_referer = strtolower (trim($HTTP_REFERER));

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
    global  $normalized_username, $normalized_password, $session_time;
    $cookie_name = $normalized_username;

    //session_register("cookie_name");
    $_SESSION ["cookie_name"] = $cookie_name;
    $enc_pwd = md5($normalized_password);
    //session_register("enc_pwd");
    $_SESSION ["enc_pwd"] = $enc_pwd;

    //nov14 header("Location: $referer");
    setcookie('supporter_usercookie', $cookie_name,  time()+ $session_time);
    setcookie('supporter_pwdcookie', $normalized_password,  time()+ $session_time);
}
?>

    <style>
        * {margin: 0; padding: 0;}
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
        .intro-1{
            background:  url("../img/svg/bg1.png") no-repeat, linear-gradient(rgba(63, 81, 181, 0.5), rgba(67, 20, 34, 0.9)) !important;
            background-size: cover;
        }
        .intro-2 {
            background: background: -moz-linear-gradient(top, rgba(30,27,107,1) 0%, rgba(44,178,158,1) 47%, rgba(44,178,158,1) 53%, rgba(255,197,112,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(30,27,107,1) 0%,rgba(44,178,158,1) 47%,rgba(44,178,158,1) 53%,rgba(255,197,112,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(30,27,107,1) 0%,rgba(44,178,158,1) 47%,rgba(44,178,158,1) 53%,rgba(255,197,112,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e1b6b', endColorstr='#ffc570',GradientType=0 ); /* IE6-9 */;
            background-size: cover;
        }
        .intro-3 {
            background: url("../img/IMG_3629.png")no-repeat center center;
            background-size: cover;
        }
        .intro-4 {
            background: url("../img/wormhole.png")no-repeat center center;
            background-size: cover;
        }
        .intro-5 {
            background: url("../img/wave55.jpg")no-repeat center center;
            background-size: cover;
        }
        .intro-6 {
            background: url("../img/wormholke.jpg")no-repeat center center;
            background-size: cover;
        }
        .intro-7 {
            background: rgb(30,27,107); /* Old browsers */
            background: -moz-linear-gradient(top, rgba(30,27,107,1) 0%, rgba(116,56,137,1) 47%, rgba(136,44,178,1) 53%, rgba(255,197,112,1) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(30,27,107,1) 0%,rgba(116,56,137,1) 47%,rgba(136,44,178,1) 53%,rgba(255,197,112,1) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(30,27,107,1) 0%,rgba(116,56,137,1) 47%,rgba(136,44,178,1) 53%,rgba(255,197,112,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e1b6b', endColorstr='#ffc570',GradientType=0 ); /* IE6-9 */
        }
        .intro-8 {
            background: url("../img/KTMduke.jpg")no-repeat center center;
            background-size: cover;
        }
        .intro-9 {
            background: url("../img/mountains.jpg")no-repeat center center;
            background-size: cover;
        }
        .intro-10 {
            background: url("../img/chicago.jpg")no-repeat center center;
            background-size: cover;
        }

        .top-nav-collapse {
            background-color: #ff8a65 !important;
            /*  background-color: #3f51b5 !important; */
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background-color: #ff8a65 !important;
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
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

    </style>


    <!-- JQuery -->
    <script src="../mdb/js/jquery-3.2.1.js"></script>
    <!-- Bootstrap tooltips -->
    <script src="../mdb/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="../mdb/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript    +++   mdb.min -->

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <!-- SCRIPTS -->

    <!-- SCRIPTS -->

    <!--suppress JSUnusedGlobalSymbols, JSUnusedGlobalSymbols -->
    <script type="text/javascript">


    $(document).ready(function(){

    // jQuery methods go here...

/*
        jQuery.validator.addMethod("require_from_group", function(value, element, options) {
            let $fields = jQuery(options[1], element.form),
                $fieldsFirst = $fields.eq(0),
                validator = $fieldsFirst.data('valid_req_grp') ? $fieldsFirst.data('valid_req_grp') : jQuery.extend({}, this),
                isValid = $fields.filter(function() {
                    return validator.elementValue(this);
                }).length >= options[0];

            // Store the cloned validator for future validation
            $fieldsFirst.data('valid_req_grp', validator);
            // If element isn't being validated, run each require_from_group field's validation rules
            if (!jQuery(element).data('being_validated')) {
                $fields.data('being_validated', true);
                $fields.each(function() {
                    validator.element(this);
                });
                $fields.data('being_validated', false);
            }
            return isValid;
        },"Please fill ALL of these fields.");

        // Require old password when setting new one.

        jQuery.validator.addMethod("old_pass_if_changing", function(value, element, options) {
                let oldpass = jQuery(options[0]);
                let newpass = jQuery(options[1]);
            return (!oldpass.val() && newpass.val()) //return true or falsse

        },"Old password must be supplied when setting new one.");

        jQuery.validator.addMethod("notEqual", function(value, element, param) {
            return this.optional(element) || (value !== param);
        },"New Password cannot be the same as current.");



        jQuery.validator.addMethod("validpassword", function(value, element) {
            return this.optional(element) ||
                /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/.test(value);
        },"Password must contain a minimum of 1 lower case letter," +
            " 1 upper case letter, 1 numeric and 1 special character.");
*/

        // Wait for the DOM to be ready
/*
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
                    form32: {required: true,
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
                        equalTo:  "#pass2"
                    }

                }


            });
*/


/*         jQuery.validator.setDefaults({
            highlight: function(element) {
                jQuery(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                jQuery(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'label label-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        }); */



    }); //$(document).ready(function()
    </script>
</head>

<body>




<?php
if($enable_helpdesk == 'Off'){
    printerror($on_off_reason);
    exit;
}


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
                header("location:/supporter/index.php");
            }
            setUserCookie();
        } else {
            echo $lang_wronglogin;
            exit;
        }
    }

}
?>
<header>
<?php

//check the cookie first.
if (!isSet($_SESSION ['cookie_name'])) {
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
        } </script>';


require "mdblogin.php";
}
else
{  //Cookie was set

            //if s
            //ubmit has not been pressed, check the cookie against the database.

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

<!--Main Navigation-->


</body>
</html>

