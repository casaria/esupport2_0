<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>DyLay</title>
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
			<h1>Scheduler</h1>
			<div id="sandbox">
				<div class="row">
					<div class="col-sm-8">
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
					<div class="col-sm-8">
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


						<div class="col-sm-4 overhead" ticket_id="5">

							<span style="height: 200px;">#4530<br>Short deascription<br>line 2</span>
						</div>
						<div class="col-sm-4 billable" ticket_id="6">
							<span style="height: 40px;">#4320</span>
						</div>
						<div class="col-sm-4 billable" ticket_id="3">
							<span style="height: 40px;">#4857</span>
						</div>
						<div class="col-sm-4 billable" ticket_id="2">
							<span style="height: 20px;">#4858</span>
						</div>
						<div class="col-sm-4 overhead"  ticket_id="4">
							<span style="height: 60px;">#3567</span>
						</div>
						<div class="col-sm-4 consonne" ticket_id="1">
							<span style="height: 60px;">#4584</span>
						</div>
						<div class="col-sm-4 billable" ticket_id="17">
							<span style="height: 20px;">#4000</span>
						</div>
					</div>
                    <H2>TOTAL TICKETS: <?PHP echo $recordcount; ?>
                    </H2>
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
            $timeConstraint = "";
            $statusmessage = '';


            $sql2 = "select * from $mysql_tickets_table where status != 'CLOSED' and id >= 6840 order by id desc";
            $result2 = $db->query($sql2);


    while ($row = $db->fetch_array($result2))
    {
        $last_update = $row['lastupdate'];  //last update timestamp.

        echo "<div class=\"col-sm-4 \"" . " ticket_id=\"$row[id]\">";
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
