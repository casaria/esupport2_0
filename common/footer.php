<?php

/***********************************************************************************************************
**
**	file:	footer.php
**
**	This file contains all footer information.
**
************************************************************************************************************

require_once  $_SERVER['DOCUMENT_ROOT']."/common/themelib.php";
//$theme = getThemeVars(getThemeName('default'));


echo '<br><div class="stats" align="center"> '.$helpdesk_name.<b> Database: $dbname'</b><br>';
echo "$lang_powered Peter & <b><a href=\"https://odoo.casaria.net\">TheTeam</a></b> V$version<br>";
echo "<a href=\"https://icons8.com/icon/44052/Shopping-Cart-Loaded\"> icon credits</a><br>";
if($enable_stats == 'On'){
    $mtime2 = explode(" ", microtime());
    $endtime = $mtime2[0] + $mtime2[1];
	$totaltime = $endtime - $starttime;
	$totaltime = number_format($totaltime, 7);
	
	echo "$lang_processed: $totaltime $lang_seconds, $db->queries $lang_queries<br>";
}
echo "</div>";
