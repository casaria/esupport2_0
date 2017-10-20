<?php

/***************************************************************************************************
**	file:	updatelog.php
**		This file generates the update log given a specified ticket number and displays it in its
**	own window.
**
****************************************************************************************************
	**
	**	author:	JD Bottorf
	**	date:	10/17/01
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
session_start();


require_once "../common/config.php";
require_once "../common/$database.class.php";
require_once "../common/common.php";
//+++ avoid "you are not a supporter" if selecting the updatelog
//require_once "../common/login.php";
RewindSession();
//$cookie_name = $_SESSION['cookie_name'];
$language = getLanguage($cookie_name);
if($language == '')
	require_once "../lang/$default_language.lang.php";
else
	require_once "../lang/$language".".lang.php";
require_once "../common/style.php";

$time_offset = getTimeOffset($cookie_name);
$time = time() + ($time_offset * 3600);

$sql = "select update_log from $mysql_tickets_table where id=$id";
$result = $db->query($sql);
$s ='';

$log = $db->fetch_row($result);

//put the contents of the update log in an array
$log = explode($delimiter, $log[0]);



?>
<?php
echo "<form action=updatelogprint.php?cookie_name=$cookie_name&id=$id method=post enctype=\"multipart/form-data\">";
//echo "<form action=updatepdfprint.php method=post >";
	echo "<input type=submit name=print value=\"CLICK HERE to PRINT\">";
echo "</form>";
?>
<TABLE class=border cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
			<TR> 
			<TD> 
				<TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
					<TR>
					<TD class=info> 
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr><TD width=10% class=info align=left> <font size=1> 
						
						
<?php
	if(!isset($s))
            echo "<a class=hf href=\"updatelog.php?s=rev&id=$id\">$lang_reverse</a> </font> </td>";
	else
            echo "<a class=hf href=\"updatelog.php?id=$id\">$lang_reverse </a> </font> </td>";
							
?>
						
<TD class=info align=left><B>

<?php  $ticket = getTicketInfo($id);
	echo $lang_ulog." Ticket ID #".$id."<br>"; 
	echo "$lang_equipment: $ticket[equipment]";
	echo " - ".$ticket["short"]."<br>";
	echo "$lang_category: $ticket[category] / $lang_platform: $ticket[platform]";
	echo "<br>$lang_ticketcreatedby: $ticket[user] / $lang_supporter: $ticket[supporter]  : $ticket[short]";
?>
</td>
</TR>
</table>
</td>
</tr>

<?php
	$description = "<b>DESCRIPTION:<BR></b>".$ticket['description'];
	echo " <tr><td colspan=1 class=back2 align=left><font size=2>".$description."</font></td></tr>";
        //echo sizeof($log);
	if($s != "rev"){
	   for($i=0; $i<sizeof($log)-1; $i++){
		$log[$i] = eregi_replace("\n", "<br>", $log[$i]);
		$log[$i] = eregi_replace("  ", "&nbsp;&nbsp;", $log[$i]);
		$log[$i] = stripslashes($log[$i]);

                if(eregi("^[0-9]{8,11}", $log[$i])){            //if it contains just the timestamp, edit it.
			$date = substr(eregi_replace("lang(.*)", "", $log[$i]), 0, -2);
			$date = date("F j, Y, g:i a", $date);
			eval("\$log[$i] = \"$log[$i]\";");
			$log[$i] = eregi_replace("^[0-9]*", "$date ", $log[$i]);
		}
								
		if($i%2 == 0){
			echo "<tr><td colspan=2 class=cat align=left><font size=1><b>". $log[$i] ."</b></font></td></tr>";
		}
		else{
			if(preg_match("[$]", $log[$i])) {
			    $log[$i]= addslashes($log[$i]); //this accounts for older tickets which don't have variables in the update log.
                eval("\$log[$i] = \"$log[$i]\";");    //if the update log doesn't contain variables, this eval doesn't work.
            }
                $log[$i] = stripslashes($log[$i]);
				echo "<tr><td colspan=2 class=back2 align=left>&nbsp;&nbsp;&nbsp;&nbsp;". $log[$i] ."<br></td></tr>";
		}
	   }
	unset($date);
	}
	else{
	   for($i=sizeof($log)-2; $i>=0; $i--){
		$log[$i] = eregi_replace("\n", "<br>", $log[$i]);
		$log[$i] = eregi_replace("  ", "&nbsp;&nbsp;", $log[$i]);
		$log[$i] = stripslashes($log[$i]);

                if(eregi("^[0-9]{8,11}", $log[$i-1])){          //if it contains just the timestamp, edit it.
			$date = substr(eregi_replace("lang(.*)", "", $log[$i-1]), 0, -2);
			$date = date("F j, Y, g:i a", $date);
			$line = $log[$i-1];
			eval("\$line = \"$line\";");
			$log[$i-1] = eregi_replace("^[0-9]*", "$date", $line);
		}
								
		$text = $log[$i+1];
								
								
		if($i%2 != 0){
			echo "<tr><td colspan=2 class=cat align=left><font size=1><b>". $log[$i-1] ."</b></font></td></tr>";
		}
		else{
			if(eregi("[$]", $log[$i+1]))	//this accounts for older tickets which don't have variables in the update log.
				eval("\$text = \"$text\";");	//if the update log doesn't contain variables, this eval doesn't work.
			$text = stripslashes($text);
			echo "<tr><td colspan=2 class=back2 align=left>&nbsp;&nbsp;&nbsp;&nbsp;". $text ."<br></td></tr>";
		}		
 	   }
	}
	
?>

</table>
</td>
</tr>
</table><br>

<?PHP
	
	startTable("$lang_timehistory", "left", 100, 4);

	$sql = "select trk.supporter_id, trk.work_date, trk.reference,  trk.minutes from tickets as tkt, time_track as trk where (tkt.id=trk.ticket_id AND tkt.id=$id)";
	$resultsupporters = $db->query($sql);


  while($row = $db->fetch_array($resultsupporters)){
    if ($row['minutes'] != 0) {
    	echo '<tr>
    		<td width=27% class=back2 align=right>';
    		if ($row['work_date'])
    		    echo date("F j, Y", $row['work_date']);
    		  else
    		    echo "- No Date -";
    		echo '</td>';
    	echo '<td width=25% class=back>';
    		  $sql = "select * from $mysql_users_table where id=$row[supporter_id]";
    		  $result = $db->query($sql);
    		  $sup_row = $db->fetch_array($result);
    			echo "$sup_row[user_name]"; 
    	echo '</td>';			
    	echo '<td width=25% class=back2>';
    			showFormattedTime($row['minutes'] * 60, 0);
    	echo '</td>';			
    	echo '<td class=back>';
    			echo "$row[reference]"; 
    	echo '</td>';				
	  }
	}
	
		
		
		
	// Calculates total time spent on the ticket in minutes
	
  echo '<tr><td width=24% class=back2 align=right><B>Total Time:</B>';
	echo '</td> <td class=back >';
	echo '</td> <td class=back colspan=2>';
				$results=getTicketTotalTime($id);
				$supporters = $results['supporters'];
				$supporters_after_hours = $results['supporters_after_hours'];
				$supporters_engineer_rate= $results['supporters_engineer_rate'];
				$minutes = $results['total_time'];

	echo'<B>';
	showFormattedTime($minutes * 60, 0);
	echo '</B></td>';

	endTable();

  DrawTableSupporterTotals(getTicketTotalTime($id), $id, $lang_time_totals);


?>