<?php

/***************************************************************************************************
**	file: tcreate.php
**
**	This file contains the frontend for creating a new ticket.  Provides error checking and also
**	accesses the database to insert the information.
**
****************************************************************************************************
	**
	**	author:	JD Bottorf
	**	date:	10/05/01
	***********************************************************************************************
			**
			**	Copyright (C) 2001  <JD Bottorf>
			**
			**		This program is free software; you can redistribute it and/or
			**		modify it under the terms of the GNU General Public
			**		License as published by the Free Software Foundation; either
			**		version 2.1 of the License, or (at your option) any later version.
			**
			**		This program is distributed in the hope that it will be useful,
			**		but WITHOUT ANY WARRANTY; without even the implied warranty of
			**		MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
			**		General Public License for more details.
			**
			**		You should have received a copy of the GNU General Public
			**		License along with This program; if not, write to the Free Software
			**		Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
			**
			***************************************************************************************/

require_once "../common/config.php";
require_once "../common/$database.class.php";
require_once "../common/common.php";
$language = getLanguage($cookie_name);
if($language == '')
	require_once "../lang/$default_language.lang.php";
else
	require_once "../lang/$language.lang.php";

	

if(isset($create)) {
    //after all error checking...insert into the database.

    $SupporteRowArray = getUserInfo($supporter_id);
    $SupporterName = $SupporteRowArray['user_name'];


    //+++ change to the timezone of the facility ?? Not
    //available in database yet
    //$time_offset = getTimeOffset($name);
    $time_offset = $SupporteRowArray["time_offset"];
    $time = time() + ($time_offset * 3600);

    $UserRowArray = getUserInfo($userid);
    $UserName = $UserRowArray['user_name'];

    if ($group == '' || $priority == '' || $UserName == '' || $short == '' || $description == '') {
        header("Location: index.php?t=terr");
        exit;
    }

    if ($short == '') {
        $short = "$lang_nodesc";
    }
    if ($sg == '') {
        $sg = 1;
    }


    $short = addslashes(stripScripts($short));
    $description = addslashes(stripScripts($description));
    //$ugroup_id = getUGroupId($usergroup_name);
    $ugroup_id = $ug;

    //fix checkboxes
    $emailgroup = ($emailgroup == "on") ? "On" : "Off";
    $emailstatuschange = ($emailstatuschange == "on") ? "On" : "Off";

    $billing_status = "0";

    $sql = "INSERT INTO $mysql_tickets_table (`id`, `create_date`, `groupid`, `ugroupid`, `supporter`, `supporter_id`, `priority`, `status`, `BILLING_STATUS`, `user`, `email`, `office`, `phone`, `equipment`, `category`, `platform`, `short`, `description`, `update_log`, `survey`, `lastupdate`, `emailgroup`, `emailstatuschange`, `emailcc`, `closed_date`, `minutes_labor`, `castag_id`) VALUES (NULL, $time, $sg, $ugroup_id, '$SupporterName', $supporter_id, '$priority', '$status', '$billing_status','$UserName','$email','$office', '$phone','$equipment', '$category', '$platform', '$short', '$description', '', 0, $time,'$emailgroup', '$emailstatuschange', '$emailcc', 0, 0, 0)";

    $db->query($sql);

    /*
	//grab the id number of the ticket so we can create the created by in the update log.
	$sql = "SELECT id from $mysql_tickets_table where create_date='$time' and user='$UserRowArray' and short='$short' and description='$description'";
	$result = $db->query($sql);
	$row = $db->fetch_row($result);
	$id = $row[0];
	*/

    $last_insert_id = mysql_insert_id();
    $id = $last_insert_id;

    //update the log so it shows who created the ticket now.
    $msg = "<i>$lang_ticketcreatedby $logged_in_user</i>";
    $log = updateLog($id, $msg);
    $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
    $db->query($sql);


    //finally, to keep track of time stuff:
    if ($status != getRStatus(getLowestRank($mysql_tstatus_table))) {
        $time = $time + 1;  //add one just so the response time isn't 0.
        $sql = "INSERT into $mysql_time_table (ticket_id, supporter_id, opened_date) values ('$id', '$supporter_id', $time)";
        $db->query($sql);
    }

    //insert the file into the database if it exists.
    ProcessAttachment();


    //if the pager gateway is enabled...send a page to the supporters of that group if the ticket is set above the default.

    if ($enable_pager == 'On' && (getRank($priority, $mysql_tpriorities_table) >= $pager_rank_low)) {
        $template_name = 'email_group_page';
        sendGroupPage($template_name, $sg, $UserRowArray, $short, $priority, $id);
    }
    //now print out the html that lets the user know that their ticket was submitted successfully.
    header("Location: $supporter_site_url/index.php?t=tsuc&id=$id");

}
else{
	echo "<form action=tcreate.php method=post enctype=\"multipart/form-data\">";
?>
	
	<script language="JavaScript">
		<!--
		function MM_jumpMenu(targ,selObj,restore){ //v3.0
		  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
		  if (restore) selObj.selectedIndex=0;
		}
		//--></script>


<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#scan"><H3>SCAN</H3></a></li>
        <li><a data-toggle="tab" href="#legacy"><H3>LEGACY</H3></a></li>
        <li><a data-toggle="tab" href="#extra"><H3>EXTRA</H3></a></li>
        <li><a data-toggle="tab" href="#asset"><H3>ASSET</H3></a></li>
    </ul>

    <div class="tab-content">
        <div id="scan" class="tab-pane fade in active">
            <h3>SCAN</h3>
            <p>SCAN or enter CASARIA Tag# to identify asset and all available details automatically. <BR>
            ENTER or SCAN CASARIA TAG# assigned to the asset. As an alternative select by<br><br>
            <UL>
                <li><H4>Facility</H4></li>
                <li><h4>Category</h4></li>
                <li><h4>Asset</h4></li>
            </UL>
            <h2>Goto LEGACY to create TKT until active!</h2>
            </p>
        </div>
        <div id="legacy" class="tab-pane fade">
            <h3>LEGACY</h3>
            <p>Manually enter ticket the "classic/legacy" way
     <?php      createTicketHeader("$lang_create $lang_ticket");
                createSupporterInfo();
                createNotificationPanel();
                createUserInfo();
                createTicketInfo('allow',$ug);
                //echo "<center>";
                echo "<input type=submit name=create value=\"$lang_create $lang_ticket\">";
                echo "&nbsp;&nbsp;&nbsp;";
                echo "<input type=reset name=reset value=$lang_reset>";
                echo "<input type=hidden name=sg value=".$sg.">";
                echo "<input type=hidden name=ug value=".$ug.">";
                echo "<input type=hidden name=userid value=".$userid.">";
                echo "<input type=hidden name=logged_in_user value=$cookie_name>";
                echo "</form>";
                //echo "</center>";
                }?>
            </p>
        </div>
        <div id="extra" class="tab-pane fade">
            <h3>EXTRA</h3>
            <p>Additional ticket details (PO/Customer reference, cost centers, </p>
        </div>
        <div id="asset" class="tab-pane fade">
            <h3>EXTRA</h3>
            <p<H4>The extra tab is for tests right now"</H4>


            </p>
        </div>
    </div>
</div>
<?php


function createSupporterInfo()
{
	global $sg, $lang_supporterinfo, $userid, $ug, $lang_priority,$lang_group, $lang_ticket, $lang_status,$lang_supporter,$lang_supportergroup;

	if($sg == '')
		$sg = getDefaultSupporterGroupID();

	startTable("$lang_supporterinfo", "left", 100, 2);
		echo '<tr>
				<td width="180px" class=back2 align=left>* '.$lang_group.':</td>
				<td class=back >';
				?>
			    	<select id="selectwidth" name=usergroup_name onChange="MM_jumpMenu('parent', this, 0)">
				<?php					
				$ug=createUGroupsMenu();
				echo '</select>				
				</td></tr>					
		
				<tr>
				<td class=back2 align=left>'.$lang_supportergroup.':</td>
				<td class=back >';
				?>
				<select id="selectwidth" name=group onChange="MM_jumpMenu('parent', this, 0)">
				<?php
				
				$sg=createSupportGroupMenu($ug);

		echo '</select>
				</td>
				</tr><tr>
				<td class=back2 align=left>'.$lang_supporter.': </td>
				<td class=back align=left>
				<select id="selectwidth" name=supporter_id>';
				createSupporterMenu($sg);
				echo '</select></td></tr>';



		echo'	<tr>
				<td class=back2 align=left>'.$lang_ticket.' '.$lang_priority.':</td>
				<td class=back>
				<select id="selectwidth" name=priority>';
				createPriorityMenu();  
		echo '</select></tr></td>';

		echo '<tr>
				<td class=back2 align=left>'.$lang_ticket.' '.$lang_status.':</td>
				<td class=back>
				<select id="selectwidth2" name=status>';

				createStatusMenu(0,1);

		echo '</select>
				</td>
				</tr>';

	endTable();

}




function createSupporterUserMenu($group_id)
{
	global $mysql_users_table, $db, $sg, $ug, $userid, $cookie_name;

	
		$sql = "select id,user_name,supporter from $mysql_users_table order by supporter desc, user_name asc";
		$table = $mysql_users_table;
	

	$result = $db->query($sql);

	while($row = $db->fetch_row($result)){
		echo "<option value=\"index.php?t=tcre&sg=$sg&ug=$ug&userid=$row[0]\"";
		if (!isset($userid) || $userid=="") {
			if ((strtolower($cookie_name)) == (strtolower($row[1]))) {
				echo " selected";
				$userid = $row[0];	
			}
		}
		else
			if($userid == $row[0]){
				echo " selected";
				$userid = $row[0];
			}
		echo "> $row[1]"; echo ($row[2]==1) ? " (supporter)": "" ; 
		echo" </option>";
	}

	return $userid;
}

function createSupporterMenu($group_id)
{
	global $mysql_users_table, $db, $cookie_name;

	if($group_id == '' || !isset($group_id) || $group_id == 1){
		$sql = "select id,user_name from $mysql_users_table where supporter=1 order by user_name asc";
		$table = $mysql_users_table;
	}
	else{
		$table = "sgroup" . $group_id;
		$sql = "select user_id,user_name from $table order by user_name asc";
	}

	$result = $db->query($sql);

	while($row = $db->fetch_row($result)){
		echo "<option value=\"$row[0]\"";
		if((strtolower($cookie_name)) == (strtolower($row[1])) )
			echo " selected";
		echo ">".strtolower($row[1])."</option>";
	}

}

function createNotificationPanel()
{
global $db, $mysql_ugroups_table, $info, $lang_emailgroup, $lang_emailstatuschange, $lang_notification, $lang_email, $lang_emailcc;

startTable("$lang_notification ", "left", 100, 2);
echo '
    <tr>
     <td class="back2" align="left" width="180px">'.$lang_emailgroup.': </td>
     <td class="back">'.
    "<input class=box type=checkbox";
		  echo " checked";
			echo " name=emailgroup></td>".
    '</td>
    </tr>
    
    <tr>
     <td class="back2" align="left" width="180px">'.$lang_emailstatuschange.': </td>
     <td class="back">'.
    "<input class=box type=checkbox";
			echo " checked";
		echo " name=emailstatuschange></td>".
    '</td>
    </tr>
    
    <tr>
     <td class="back2" align="left" width="180px">'.$lang_emailcc.': </td>
     <td class="back">
			<input type=text size=55 name=emailcc value="'.'">			
	</td>
    </tr>';
endTable();
}
function createSupportGroupMenu($ugroup=1)
{
	global $mysql_sgroups_table, $mysql_ugroups_table, $sg, $ug, $userid, $info, $id, $db;
	//get the default suppoerter group based on the user group
	if ($sg=="") {
	    $sql =  "select defaultsupportid from $mysql_ugroups_table where id=$ugroup";
	    $result = $db->query($sql);
	    $row = $db->fetch_row($result);
	    $default_group = $row[0];
	} else
	{
	    $default_group = $sg;	
	}
	// get the list of all supporter groups
	$sql = "select id, group_name from $mysql_sgroups_table order by rank asc";
	$result = $db->query($sql);
	$num_rows = $db->num_rows($result);
	
	
		while($row = $db->fetch_array($result)){
			if($num_rows == 1 || $row['id'] != 1){
				echo "<option value=\"index.php?t=tcre&ug=$ug&userid=$userid&sg=$row[id]\"";
					if($sg == $row['id'] ||  $row['id']== $default_group){
						echo " selected";
						$sg = $row['id'];
					}
				echo ">".$row['group_name']."</option>";
			}
		}
	return $sg;
}

function createUserInfo()
{
	global $db, $mysql_users_table, $lang_createdby, $lang_username, $sg, $userid, $lang_email, $lang_office, $lang_phoneext;
 	
 
 
 
        startTable("$lang_createdby", "left", 100, 4); 

				
		echo '<tr>
				
				
				
				<td width="180px" class=back2 align=right>'.$lang_username.':</td>
				<td class=back >';
					
				?>
			    	<select name=userlink id="selectwidth2" onChange="MM_jumpMenu('parent', this, 0)">
				<?php	
					
				$userid=createSupporterUserMenu($sg);
				echo '</select>';

	
	$sql = "select * from $mysql_users_table where id=$userid";
 	$result = $db->query($sql);
 	$row = $db->fetch_array($result);
					

				echo" 
                 </td>
                 
                 </tr><tr>   
				<td class=back2 align=right>".$lang_email.": </td>
				<td class=back align=left>
					<input type=text size=24 name=email value=\"$row[email]\">
				</td>
				
				</tr>
				<tr>
				<td class=back2 align=right>".$lang_office.":</td>
				<td class=back>
					<input type=text size=24 name=office value=\"$row[office]\">
				</td>
				</tr><tr> 
				<td class=back2 align=right>".$lang_phoneext.":</td>
				<td class=back>
					<input type=text size=24 name=phone value=\"$row[phone]\">
				</td>";

	endTable();
}

?>
