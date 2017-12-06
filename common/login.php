<!DOCTYPE html>
<?php
ob_start(null,0, PHP_OUTPUT_HANDLER_FLUSHABLE|PHP_OUTPUT_HANDLER_CLEANABLE|PHP_OUTPUT_HANDLER_REMOVABLE);
?>
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
//$normalized_username ='';
//$normalized_password ='';
//$normalized_referer ='';
require_once  $_SERVER['DOCUMENT_ROOT']."/common/config.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/common/$database.class.php";
require_once  $_SERVER['DOCUMENT_ROOT']."/common/common.php";
/** @noinspection PhpIncludeInspection */
require_once $_SERVER['DOCUMENT_ROOT']."/lang/$default_language.lang.php";


if (isset($_POST['refer'])) {
    $normalized_referer = strtolower(trim($_POST['refer']));
    switch ($normalized_referer) {
        case 'admin':
            $normalized_referer = "/admin/control.php";
            break;
        case 'supporter':
            $normalized_referer = "/support/index.php";
            break;

        default:
            $normalized_referer = "";
    }
}



function setSession(){
    global $normalized_username, $normalized_password, $remote_ip;
    startSession();  //creates a new one
    //session_status() === PHP_SESSION_ACTIVE  ? $cookieuser = '' : startSession();

    $cookie_name = $normalized_username;
    $_SESSION ['cookie_name'] = $cookie_name;
    $enc_pwd = md5($normalized_password);
    $_SESSION ['enc_pwd'] = $enc_pwd;
    $_SESSION ['timestamp'] = time();
    $_SESSION ['IP'] = $remote_ip;


}


function setUserCookie()
{
    global $normalized_username, $normalized_password, $session_time;
    $cookie_name = $normalized_username;
    setSession();

    setcookie('cookieuser', $cookie_name, time() + $session_time, '/', 'casaria.net');
   // setcookie('cookiepwd', $normalized_password, time() + $session_time, '/', 'casaria.net');
    setcookie('session_id', session_id(), time() + $session_time, '/', 'casaria.net');
}

function setSupporterCookie()
{
    global  $normalized_username, $normalized_password, $session_time;
    $cookie_name = $normalized_username;
    setSession();
    setcookie('supporter_usercookie', $cookie_name,  time()+ $session_time, '/', 'casaria.net');
    //setcookie('supporter_pwdcookie', $normalized_password,  time()+ $session_time, '/', 'casaria.net');
    setcookie('session_id', session_id(), time() + $session_time, '/', 'casaria.net');
}
function presetValues()
{   global $cookie_name, $ugID_list, $user_id;

    //get some globals about the user
    if ($cookie_name != '') {
        $user_id = getUserId($cookie_name);
        $ugID_list = getUsersGroupIDList($user_id);
    }
}
function logAuthFailure(){
global $lang_wronglogin, $lang_strikes_count;
    ob_end_flush();
    http_response_code(403);  //let's log it in nginx log
    echo $lang_wronglogin+ " " + $lang_strikes_count;
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
            background-color: #3f51b5 !important;
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
            color: #fdffe3 !important;
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
            color: bisque;
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

        new WOW().init();


        function capsLock(e){
            var kc = e.keyCode ? e.keyCode : e.which;
            var sk = e.shiftKey ? e.shiftKey : kc === 16;
            var visibility = ((kc >= 65 && kc <= 90) && !sk) ||
            ((kc >= 97 && kc <= 122) && sk) ? 'visible' : 'hidden';
            document.getElementById('divCaps').style.visibility = visibility
        }



        $("#newPassForm").submit(function(event){
            // cancels the form submission
            event.preventDefault();
            submitForm();
        });

        function submitForm(){
            // Initiate Variables With Form Content
            var name = $("#name").val();

            $.ajax({
                type: "POST",
                url: "password-process.php",
                data: "name=" + name + "&pwd=" + password + "&message=" + message,
                success : function(text){
                    if (text == "success"){
                        formSuccess();
                    }
                }
            })
        }
        function formSuccess(){
            $( "#msgSubmit" ).removeClass( "hidden" );
        }


        //    function setfocus(){
    //        document.login.user.focus();
    //    }
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

if ($normalized_referer=='') {
    $postpara = "?res=";
} else {
    $postpara = "?".$normalized_referer."&res=";
}

//if submit has been hit, set the cookie and reload the page immediately so the cookie takes effect.
if (isset($login)) {
    //if admin is contained in the url, we need to make sure the user is an
    //admin before letting them login.
    if (isset($_POST['user'])) {
        $normalized_username = strtolower(trim($_POST['user']));
    }
    if (isset($_POST['password'])) {
        $normalized_password = trim($_POST['password']);
    }



    //check the user name and password against the database.
    if (checkUser($normalized_username, md5($normalized_password))) {
        $level =  getPrivelegesAsInteger($normalized_username);

        if ($level== 0) {
            ob_end_clean();
            setUserCookie();
            $myUrl =  "${protocol}://${domain}/common/login.php".$postpara."inactive";
        }
        elseif ($level == 1) {
            ob_end_clean();
            setUserCookie();
            $myUrl = "${protocol}://${domain}/index.php".$postpara."welcome";
        }
        elseif ($level == 3) {
            ob_end_clean();
            setUserCookie();
            $myUrl = "${protocol}://${domain}/index.php".$postpara."welcome-supervisor";
        }
        elseif ($level == 7) {
            ob_end_clean();
            setSupporterCookie();
            $myUrl = "${protocol}://${domain}/supporter/index.php".$postpara."welcome-supporter";
        }
        elseif ($level == 15) {
            ob_end_clean();
            setSupporterCookie();
            $myUrl = "${protocol}://${domain}/supporter/index.php".$postpara."welcome-admin";
        }
        elseif ($level == 31) {
            ob_end_clean();
            setSupporterCookie();
            $myUrl = "${protocol}://${domain}/supporter/index.php".$postpara."welcome-accountant";
        }
        elseif ($level == 63) {
            ob_end_clean();
            setSupporterCookie();
            $myUrl = "${protocol}://${domain}/supporter/index.php".$postpara."welcome-superAdmin";
        }
        elseif ($level >= 8) {
            ob_end_clean();
            setSupporterCookie();
            $myUrl = "${protocol}://${domain}/supporter/index.php".$postpara."welcome-admin";
        }

    } else {

        //ob_clean();
        //LOGIN CREDDENTIALS FAILED
        $myUrl = '';
        echo $lang_wronglogin . " CheckUSer failed!";
        $modalMessage = "$lang_wronglogin";
        ob_flush();
        require "mdblogin.php";
        logAuthFailure();
        exit;
    }



    // send them to the correct page
    if ($myUrl !== '') {
        header("location: $myUrl");
    }
    //will exit end here  if success


}  // if (isset $login)  login button


?>
<header>
    <?php
    ob_flush();
    require "mdblogin.php";

    exit;

?>

</header>


</body>
</HTML>