    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Material Design Bootstrap</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->

        <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>


<!--Section: Live preview-->
<section class="form-light">

    <!--Form without header-->
    <div class="card">

        <div class="card-body mx-4">

            <!--Header-->
            <div class="text-center">
                <h3 class="pink-text mb-5"><strong>Sign up</strong></h3>
            </div>

            <!--Body-->
            <div class="md-form">
                <input type="text" id="Form-email2" class="form-control">
                <label for="Form-email2">Your email</label>
            </div>

            <div class="md-form pb-3">
                <input type="password" id="Form-pass2" class="form-control">
                <label for="Form-pass2">Your password</label>
                <div class="form-check my-4">
                  <input class="form-check-input" type="checkbox" id="defaultCheck12">
                  <label for="defaultCheck12" class="grey-text">Accept the<a href="#" class="blue-text"> Terms and Conditions</a></label>
                </div>
            </div>

            <!--Grid row-->
            <div class="row d-flex align-items-center mb-4">

                <!--Grid column-->
                <div class="col-md-3 col-md-6 text-center">
                    <button type="button" class="btn btn-pink btn-block btn-rounded z-depth-1">Sign up</button>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <p class="font-small grey-text d-flex justify-content-end">Have an account? <a href="#" class="blue-text ml-1"> Log in</a></p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

        <!--Footer-->
        <div class="footer pt-3 mdb-color lighten-3">

            <div class="row d-flex justify-content-center">
                <p class="font-small white-text mb-2 pt-3">or Sign up with:</p>
            </div>

            <div class="row mt-2 mb-3 d-flex justify-content-center">
                <!--Facebook-->
                <a class="fa-lg p-2 m-2 fb-ic"><i class="fa fa-facebook white-text fa-lg"> </i></a>
                <!--Twitter-->
                <a class="fa-lg p-2 m-2 tw-ic"><i class="fa fa-twitter white-text fa-lg"> </i></a>
                <!--Google +-->
                <a class="fa-lg p-2 m-2 gplus-ic"><i class="fa fa-google-plus white-text fa-lg"> </i></a>
            </div>

        </div>

    </div>
    <!--/Form without header-->1`

</section>
<!--Section: Live preview-->


</head>

<body>

<!-- Start your project here-->

<!--Card-->
<div class="card m-5" style="width: 22rem;">

    <!--Card image-->
    <div class="view overlay hm-white-slight">
        <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20%287%29.jpg" class="img-fluid" alt="">
        <a href="#">
            <div class="mask"></div>
        </a>
    </div>

    <!--Card content-->
    <div class="card-body">
        <!--Title-->
        <h4 class="card-title">Card title</h4>
        <!--Text-->
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        <button href="#" class="btn btn-primary">Button></button>
        <?php

        include("vcardexp.inc.php");
        require_once "../common/config.php";
        require_once "../common/$database.class.php";
        require_once "../common/common.php";

        include ("VCARD.css");
        $sql = "select * from $mysql_users_table where admin=1 and user_name != 'support_pool' order by user_name asc";

        $result = $db->query($sql);
        $fd = fopen("test.vcf", "w" );

        while($row = $db->fetch_array($result)) {
            $first = ucwords($row['first_name']);
            $last = ucwords($row['last_name']);
            $user_name = $row['user_name'];
            $email = $row['email'];
            if ($email == '')
                $email = '&nbsp;';
            $pager = $row['pager_email'];
            if ($pager == '')
                $pager = '&nbsp;';
            $office = $row['office'];
            if ($office == '')
                $office = '&nbsp;';
            $user = $row['user'];
            $supp = $row['supporter'];
            $admin = $row['admin'];

            $test = new vcardexp;

            $test->setValue("firstName", $first);
            $test->setValue("lastName", $last);
            $test->setValue("organisation", "Casaria Technology Inc.");
            $test->setValue("tel_work", $office);
            $test->setValue("tel_home", "");
            $test->setValue("tel_pref", "");
            $test->setValue("url", "https://www.casaria.net");
            $test->setValue("email_internet", $email);
            $test->setValue("email_pref", "");
            $test->setValue("street_home", "Musterstrasse 1");
            $test->setValue("postal_home", "12345");
            $test->setValue("city_home", "Musterstadt");
            $test->setValue("country_home", "Musterland");
            $test->copyPicture("test.jpg");

            $acard = $test->getCard();

            fputs($fd, $acard);
        }
        fclose($fd);


        ?>
    </div>
</div>
<!--/.Card-->


<!-- /Start your project here-->

<!-- SCRIPTS -->

</body>

</html>

