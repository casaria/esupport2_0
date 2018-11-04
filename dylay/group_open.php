<!doctype html>
<html>
	<head>
		<meta charset="utf-8">




		<title>DyLay</title>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Material Design Bootstrap</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="/mdb/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="/mdb/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->

        <!-- JQuery -->
        <script type="text/javascript" src="/mdb/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="/mdb/js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="/mdb/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="/mdb/js/mdb.min.js"></script>

        <script>    $(document).ready(function(){
                $("button").click(function(){
                    $(".card-body").hide();
                    $(".view").click(function(){
                        $(".card-body").show();
                    });
                });
            });

        </script>




        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" media="screen">
		<link href='https://fonts.googleapis.com/css?family=Titillium Web:300:400' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="assets/css/main.css" media="screen">

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
			<h1>Open Tickets</h1>
			<div id="sandbox">
				<div class="row">
                    <a class="btn-floating btn-lg blue-gradient"><i class="fa fa-bolt"></i></a>
					<div class="col-sm-6">
						<h2>Filters</h2>
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
					<div class="col-sm-6">
						<h2>Sorts</h2>
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
                    <h3>TOTAL TICKETS: <?PHP echo $recordcount; ?>
                    </h3>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="assets/vendor/jquery.easing.1.3.js"></script>
		<script src="src/dylay.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
