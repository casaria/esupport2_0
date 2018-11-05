
 * Created by PhpStorm.
 * User: horra
 * Date: 11/5/2018
 * Time: 10:20 AM
 */


<!doctype html>
<html>
	<head>
		<meta charset="utf-8">




        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>DyLay</title>


        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="/mdb/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="/mdb/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="/mdb/css/style.css" rel="stylesheet">
        <!-- Bootstrap tooltips -->
        <link href='https://fonts.googleapis.com/css?family=Titillium Web:400:600' rel='stylesheettype='text/css'>
        <link href="assets/css/main.css" rel="stylesheet"  media="screen">

        <?php
                require_once "../common/config.php";
                require_once "../common/$database.class.php";
                require_once "../common/common.php";

        ?>
    </head>
    <body>
        <select id="first-choice">
            <option selected value="base">Please Select</option>
            <option value="beverages">Beverages</option>
            <option value="snacks">Snacks</option>
        </select>

        <br>

        <select id="second-choice">
            <option>Please choose from above</option>
        </select>



<!-- DYLAY Scripts
<script src="assets/vendor/jquery.easing.1.3.js"></script>
-->
        <!-- JQuery -->
        <script type="text/javascript" src="/mdb/js/jquery-3.3.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="/mdb/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="/mdb/js/mdb.min.js"></script>
                <script src="/dylay/src/dylay.js"></script>
                <script src="/dylay/assets/js/main.js"></script>

	</body>
</html>