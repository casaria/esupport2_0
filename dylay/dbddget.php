<?php
/**
 * Created by PhpStorm.
 * User: horra
 * Date: 11/5/2018
 * Time: 9:18 AM
 */


require_once "../common/config.php";
require_once "../common/$database.class.php";
require_once "../common/common.php";


	//$selected = mysql_select_db("dropdownvalues", $db) or die("Could not select examples");
    global $db;
	$choice = mysql_real_escape_string($_GET['choice']);

	$sql = "SELECT * FROM dd_vals WHERE category='$choice'";

	//$result = mysql_query($query);
    $result = $db->query($sql);
    WHILE ($row = $db->fetch_array($result)) {
        echo "<option>" . $row['dd_val'] . "</option>";
    }
?>