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
                $recordcount = 0;
                $supporter_id = getUserID($cookie_name);
                $highest_pri = getRPriority(getHighestRank($mysql_tpriorities_table));	//set the highest priority rating
        ?>
            </head>
            <body>

                <div class="container">
                    <h2>Open Tickets</h2>
                    <div id="sandbox">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4>Filters</h4>
                                <ul id="filters">
                                    <li>
                                        <a href="#" data-filter="*">all</a>
                                    </li>
                                    <li>
                                        <a href="#" data-filter=".overhead">Overhead</a>
                                    </li>
                                    <li>
                                        <a href="#" data-filter=".billable">billable</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">

                                <!--Dropdown warning-->
                                <div class="dropdown">
                                    <!--Trigger-->
                                    <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2-2" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">With button</button>

                                    <!--Menu-->
                                    <div class="dropdown-menu fa fa-bolt dropdown-danger" id="your-custom-id-button">
                                        <!-- Search form -->
                                        <div class="md-form text-center">
                                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                                            <button class="btn peach-gradient btn-rounded btn-sm my-0" type="button">Search</button>
                                        </div>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://mdbootstrap.com/">MDB</a>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://mdbootstrap.com/react/">MDB react</a>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://mdbootstrap.com/angular/">MDB angular</a>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://mdbootstrap.com/vue/">MDB vue</a>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://brandflow.net/">BrandFlow</a>
                                        <a class="dropdown-item mdb-dropdownLink" href="https://mdbootstrap.com/bootstrap-tutorial/">MDB
                                            Rocks</a>
                                    </div>
                                </div>
                                <!--/Dropdown warning-->
                            </div>
                            <div class="col-sm-4">
                                <h4>Sorts</h4>
                                <ul id="sorts">
                                    <li>
                                        <a href="#">text</a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-by="ticket_id">ticket_id</a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-way="desc">text desc</a>
                                    </li>
                                    <li>
                                        <a href="#" data-sort-by="ticket_id" data-sort-way="desc">ticket_id desc</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="container">
                            <div id="dylay" class="row">
                                <?php PopulateTickets(); ?>

                            </div>
                            <h4>TOTAL TICKETS: <?PHP echo $recordcount; ?>
                            </h4>
                        </div>

                    </div>
                </div>


                <?php
                function PopulateTickets()
                {
                    global $mysql_tickets_table, $cookie_name, $mysql_tstatus_table, $mysql_tpriorities_table, $num_groups, $mysql_ugroups_table, $lang_summary, $lang_recordcount, $supporter_site_url, $highest_pri, $theme, $db, $admin_site_url, $mysql_BillingStatus_table,$recordcount;

                    $time_offset = getTimeOffset($cookie_name);
                    $time = time() + ($time_offset * 3600);
                    $day_const = 86400;
                    $day_difference = 90 * $day_const;
                    $time_from = time() - $day_difference;


                    $sql2 = "select * from $mysql_tickets_table where status != 'CLOSED' order by id desc";
                    $result2 = $db->query($sql2);


            while ($row = $db->fetch_array($result2))
            {
                $last_update = $row['lastupdate'];  //last update timestamp.

                echo "<div class=\"col-xs-12 col-sm-4 \"" . " ticket_id=\"$row[id]\">";
                echo "<span style=\"background-color: rgba(56,155,217, 0.6)\">";
                //"height: 120px;
                echo "<B>#".$row[id]."</B><br>".$row['equipment']."<br>".stripslashes($row['short'])."<br>". $row['user'];
                echo "</span>";
                echo"</div>";

                $recordcount++;

               }





        }
        ?>
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
                <script src="src/dylay.js"></script>
                <script src="assets/js/main.js"></script>

	</body>
</html>
