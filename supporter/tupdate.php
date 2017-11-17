<?php


/***************************************************************************************************
 **    file: tupdate.php
 **
 **    This file contains the frontend for updating a ticket.  Provides error checking and also
 **    accesses the database to insert the information.
 **
 ****************************************************************************************************
 **
 **    author:    JD Bottorf
 **    date:    10/05/01
 ***********************************************************************************************
 **
 **    Copyright (C) 2001  <JD Bottorf>
 **
 **        This program is free software; you can redistribute it and/or
 **        modify it under the terms of the GNU General Public
 **        License as published by the Free Software Foundation; either
 **        version 2.1 of the License, or (at your option) any later version.
 **
 **        This program is distributed in the hope that it will be useful,
 **        but WITHOUT ANY WARRANTY; without even the implied warranty of
 **        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 **        General Public License for more details.
 **
 **        You should have received a copy of the GNU General Public
 **        License along with This program; if not, write to the Free Software
 **        Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **
 ***************************************************************************************/

require_once "../common/config.php";
require_once "../common/mysql.class.php";
require_once "../common/common.php";
$language = getLanguage($cookie_name);
if ($language == '')
    require_once "../lang/$default_language.lang.php";

require "../common/login.php";


$time_offset = getTimeOffset($cookie_name);
$time = time() + ($time_offset * 3600);
$timestamp = $time;
$total_minutes = array(0, 0);

if (!$id) {
    printerror($lang_missing_info);
    endtable();
    endtable();
    require "../common/footer.php";
    exit;
}

if ($action == 'download') {
    $query = $db->query("SELECT * from $mysql_attachments_table where id=$id");
    $file = $db->fetch_array($query);
    if ($file[filename] == '') {
        echo $lang_fileremoved;
        exit;
    }
    $db->query("UPDATE $mysql_attachments_table SET downloads=downloads+1 WHERE id='$id'");
    // Send the attachment
    header("Content-disposition: filename=$file[filename]");
    header("Content-Length: " . strlen($file[attachment]));
    header("Content-type: $file[filetype]");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo $file[attachment];
    exit;

}

if ($groupid == 'change') {
    $sql = "UPDATE $mysql_tickets_table set groupid=$sg where id=$id";
    $result = $db->query($sql);
}

if (isset($update)) {

    //ok...update is set, we have a whole bunch of information too.
    RefreshLastUpdateTime($id);

    //if group/supporter/priority/status change (in that order), update the log accordingly.

    if ($groupid == 'change') {
        $msg = "\$lang_transferred " . getGroupName($sg);
        $log = updateLog($id, $msg);

        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
    }

    //get the user name to insert into the ticket table.
    $name = getUserInfo($supporter_id);
    $supporter = getUserInfo($supporter_id);
    $logged_in_id = getUserID($cookie_name);
    $logged_in_user = getUserInfo($logged_in_id);

    $highest_status = getRStatus(getHighestRank($mysql_tstatus_table));    //set the highest status rating
    $lowest_status = getRStatus(getLowestRank($mysql_tstatus_table));
    //update variables
    $emailgroupbox = ($emailgroup == "on") ? "On" : "Off";
    $emailstatuschangebox = ($emailstatuschange == "on") ? "On" : "Off";
    $after_hoursbox = ($after_hours == "on") ? "1" : "0";
    $engineer_ratebox = ($engineer_rate == "on") ? "1" : "0";

    //lets update the time spent first.
    if (isset($time_spent) && $time_spent != '' && $enable_time_tracking == 'On') {
        //time is set to midnight
        $work_date_stamp = mktime(9, 0, 0, $womonth, $woday, $woyear);

        $sql = "INSERT into $mysql_time_table (ticket_id, supporter_id, minutes, work_date, reference, after_hours, engineer_rate) values ('$id', '$supporter1', '$time_spent', '$work_date_stamp' ,'$reference', '$after_hoursbox', '$engineer_ratebox')";
        $db->query($sql);


        $minutes_labor += $time_spent;
    }


    //if the priority is changed, update the log to reflect the change.
    if ($old_pri != $prio) {
        $msg = "\$lang_prioritychange $prio";
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        $updated = 1;
    }
    //if the notification options are changed reflect the change.
    if ($old_emailgroup != $emailgroupbox) {
        $msg2 = $emailgroupbox;
        $msg = "\$lang_emailgroupchange $msg2";
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        $updated = 1;
    }
    if ($old_emailstatuschange != $emailstatuschangebox) {
        $msg2 = $emailstatuschangebox;
        $msg = "\$lang_emailstatuschangechange $msg2";
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        $updated = 1;
    }
    //if the notification options are changed reflect the change.
    if ($old_emailcc != $emailcc) {
        $msg = "\$lang_emailccchange $emailcc";
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        $updated = 1;
    }


    unset($statuschange);
    //if the status is changed, update the log to reflect the change.
    if ($old_status != $status) {
        $msg = "\$lang_statuschange $status";
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        if ($status != 'CLOSED') {
            $sql = "update $mysql_tickets_table set closed_date= 0 where id=$id";
            $db->query($sql);
        }
        $statuschange = 1;
        $updated = 1;

        //if the status is changed from Open (lowest rank), set the opened_date timestamp;
        //$check_status = getRStatus(getLowestRank($mysql_tstatus_table));
        if ($lowest_status == $old_status && $enable_time_tracking == 'On') {
            $sql = "INSERT into $mysql_time_table (ticket_id, supporter_id, opened_date)" .
                " values ('$id', '$supporter_id', $timestamp)";
            $db->query($sql);
        }
    }

    //need to create/update the update log.
    //if the ticket was transferred, and the update log is empty, do nothing.
    if (($updated == 1 && $update_log == '')) {
        //do nothing
    } //otherwise, update the log to show changes
    else {
        unset($updated);
        $log2 = updateLog($id, addslashes(stripScripts($update_log)));
    }

    if ($updated != 1) {

        //we are going to update the log so if the status is the lowest, change it to second lowest.
        //ie...ticket is no longer unassigned, but rather open or in progress.
        if (($old_status == $lowest_status) && $status == $lowest_status) {
            $status = getSecondStatus();

            if ($enable_time_tracking == 'On') {
                $sql = "INSERT into $mysql_time_table (ticket_id, supporter_id, opened_date) values ('$id', '$supporter1', '$timestamp')";

                $db->query($sql);


            }
        }

        $short = addslashes(stripScripts($short));
        $description = addslashes(stripScripts($description));

        $sql = "update $mysql_tickets_table set groupid='$sg', supporter='" . $name['user_name'] . "', supporter_id='$supporter_id',
				priority='$prio', status='$status', user='$username', email='$user_email', office='$office', phone='$phone',
				minutes_labor=$minutes_labor, equipment='$equipment', category='$category',platform='$plform', short='$short', description='$description', update_log='$log2'
                WHERE id=$id";
    } else {
        $short = addslashes(stripScripts($short));
        $description = addslashes(stripScripts($description));
        $sql = "update $mysql_tickets_table set groupid='$sg', supporter='" . $name['user_name'] . "', supporter_id='$supporter_id',
				priority='$prio', status='$status', user='$username', email='$user_email', office='$office', phone='$phone',
				emailgroup='$emailgroupbox', emailstatuschange='$emailstatuschangebox', emailcc='$emailcc', category='$category',
				platform='$platform', short='$short', description='$description', minutes_labor=$minutes_labor where id=$id";
    }

    $db->query($sql);

    //** Now perform email and page updates **//
    //make the ticket info available for email/evaluates etc.
    $sql = "SELECT * from $mysql_tickets_table where id=$id";
    $result = $db->query($sql);
    $ticket = $db->fetch_array($result);        //setup the ticket array so all variables are available.
    // +++ not tested $timearray = CreateTimeHistoryArray($id);

    //if the supporter name is different update the log to reflect the transfer
    if ($old_supporter != $name['user_name']) {
        $msg = "\$lang_transferred " . $name['user_name'];
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log=$log where id=$id";
        $db->query($sql);
        $updated = 1;

        //let's also send an email to that supporter (assuming they didn't do the transfer).
        if ($enable_smtp == 'win' || $enable_smtp == 'lin') {
            $temp = getUserInfo(getUserID($name['user_name']));
            $sup_email = $temp['email'];

            if ($logged_in_user['email'] != $sup_email) {

                $sub = $lang_beenassigned . " " . $lang_ticket . " #$id";

                //grab the template information for the body of the email.
                $sql = "SELECT template from $mysql_templates_table where name='email_supporter_change'";
                $result = $db->query($sql);
                $template = $db->fetch_array($result);
                $template = str_replace("\\'", "'", $template[0]);
                eval("\$body = \"$template\";");

                if ($enable_smtp == 'lin') {
                    sendmail($sup_email, $helpdesk_name, $logged_in_user['email'], $id, $body, $sub);
                }
                if ($enable_smtp == 'win') {
                    //I'm not sure how other languages handle sendmail, so i left this in English.
                    //feel free to change this line manually to suit your needs.
                    mail($sup_email, $sub, $body, "From: " . $helpdesk_name . "<" . $logged_in_user['email'] . ">\nReply-To: " . $logged_in_user['email'] . "\n");
                }
            }
        }
    }


    if (($status == $highest_status) && ($status != $old_status)) {

        //send a pager message to the support
        /*

        DO NOT SEND SUPPORTER A CLOSED TICKET UPDATE BY SNS

        if($enable_pager == 'On'){
            $template_name = 'email_group_page_update';
            sendGroupPage($template_name, $sg, $username, $short, $priority, $id);
        }
        */

        // send an email to the user upon the ticket being closed...have to get the template information first.
        if ($enable_smtp != 'Off') {
            //load the email template from the database.
            $sql = "SELECT template from $mysql_templates_table where name='email_ticket_closed'";
            $result = $db->query($sql);
            $template = $db->fetch_array($result);
            $template = str_replace("\\'", "'", $template[0]);
            eval("\$body = \"$template\";");
        }

        //if the ticket gets closed, send an email to the user
        if ($enable_smtp == 'lin') {
            //now that the update log is taken care of, we need to send the email.
            sendmail($user_email, $helpdesk_name, $logged_in_user[email], $id, $body);
        }
        if ($enable_smtp == 'win') {
            mail($user_email, "$lang_ticket $id", $body, "From: " . $helpdesk_name . "<" . $logged_in_user[email] . ">\nReply-To: " . $logged_in_user[email] . "\n");
        }


        //if time tracking is enabled, set the closed timestamp in the database.
        if ($enable_time_tracking == 'On') {
            //if the status is the highest (closed), update the time tracking table;
            $sql = "INSERT into $mysql_time_table (ticket_id, supporter_id, closed_date)" .
                " values ('$id', '$supporter1', '$timestamp')";

            $db->query($sql);

            //update the closed_date
            $sql = "update $mysql_tickets_table set closed_date= $timestamp where id=$id";
            $db->query($sql);

        }

        $location = "$supporter_site_url/index.php?t=tmop";

        //compare the ticket count to the ticket ratings count.
        if ($enable_ratings == 'On' && $closed_ticket_count == $rating_interval && ($enable_smtp == 'win' || $enable_smtp == 'lin')) {

            if ($closed_ticket_count > $ratings_interval) {
                resetRatingsCounter();
            }

            //set the survey flag in the tickets database.
            $sql = "update $mysql_tickets_table set survey=1 where id=$id";
            $db->query($sql);

            //update the closed ticket count in the database.
            $closed_ticket_count++;
            $sql = "update $mysql_settings_table set ticket_count=$closed_ticket_count";
            $db->query($sql);

            $email_msg = "$lang_ratingsemail\n\n";
            $email_msg .= "\n\n";
            $email_msg .= "$supporter_site_url/rate.php?id=$id\n\n";
            if ($enable_smtp == 'lin') {
                //now that the update log is taken care of, we need to send the email.
                sendmail($user_email, $helpdesk_name, $logged_in_user['email'], $id, $email_msg);
            }
            if ($enable_smtp == 'win') {
                mail($user_email, "$lang_ticket $id", $email_msg, "From: " . $helpdesk_name . "<" . $logged_in_user['email'] . ">\nReply-To: " . $logged_in_user['email'] . "\n");
            }

            //now that the mail is sent...reset the counter in the database.
            resetRatingsCounter();

        }

    }
    //if the email field is set, send the email to the user
    if ($email_msg != '') {
        $header = "<i>\$lang_emailsent:</i><br><br>";
        $msg = $header . addslashes(stripScripts($email_msg));
        $log = updateLog($id, $msg);
        $sql = "update $mysql_tickets_table set update_log='$log' where id=$id";
        $db->query($sql);
        $updated = 1;

        $sql = "SELECT template from $mysql_templates_table where name='email_from_ticket'";
        $result = $db->query($sql);
        $template = $db->fetch_array($result);
        $template = str_replace("\\'", "'", $template[0]);
        eval("\$email_body = \"$template\";");
        $email_body = stripslashes($email_body);


        if ($enable_smtp == 'lin') {
            //now that the update log is taken care of, we need to send the email.
            //$tio, $from, $return, $id, $msg, $subject=""
            sendmail($user_email, $helpdesk_name, $logged_in_user['email'], $id, stripScripts($email_body));
            //++++ send group email ?
        }
        if ($enable_smtp == 'win') {

            mail($user_email, "$lang_ticket $id", stripScripts($email_msg), "From: " . $helpdesk_name . "<" . $logged_in_user['email'] . ">\nReply-To: " . $logged_in_user['email'] . "\n");
        }
        //no other options...if enable_smtp is set to anything else, the email will not get sent.

    }

    // call for any update of ticket status or email_msg
    // call when $mms is "on"
    // +++ statuschange
    if ($email_msg != '' || $statuschange == 1 || $mms == 'on') {
        $groupemail_template_name = 'group_cc_template';
        $mms_template_name = 'mms_update_template';
        $statuschange_template_name = 'group_cc_statuschange_template';
        $mms_yes = ($mms == "on") ? true : NULL;
        $email_yes = ($email_msg != '') ? true : NULL;
        $status_change_yes = ($statuschange == 1) ? true : NULL;
        ProcessExtendedNotifications($groupemail_template_name, $mms_template_name, $statuschange_template_name, $mms_yes, $email_yes, $status_change_yes, $email_msg, $id);
    }
    //check and enter attachment files to db if any
    ProcessAttachment();

}

unset($update);


//set up the javascript function for creating a menu.
?>

    <script language="JavaScript">
        <!--
        function MM_jumpMenu(targ, selObj, restore) { //v3.0
            eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
            if (restore) selObj.selectedIndex = 0;
        }

        //--></script>


  <div class="container">
    <form name=form1 method=post enctype="multipart/form-data">
    <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-main" data-toggle="pill" href="#pills-main-tab" role="tab" aria-controls="pills-main" aria-selected="true"><h4>Main</h4></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-time" data-toggle="pill" href="#pills-time-tab" role="tab" aria-controls="pills-time" aria-selected="false"><h4>Time</h4></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-mat" data-toggle="pill" href="#pills-mat-tab" role="tab" aria-controls="pills-mat" aria-selected="false"><h4>Mat</h4></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-xtra" data-toggle="pill" href="#pills-xtra-tab" role="tab" aria-controls="pills-xtra" aria-selected="false"><h4>Xtra</h4></a>
        </li>
    </ul>


    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-main-tab" role="tabpanel" aria-labelledby="pills-main">
            <p><?php createMainTab();  ?>
            </p>
        </div>
        <div class="tab-pane fade" id="pills-time-tab" role="tabpanel" aria-labelledby="pills-time">
            <p><?php createTimeTab();  ?>
            </p>
        </div>
        <div class="tab-pane fade" id="pills-mat-tab" role="tabpanel" aria-labelledby="pills-mat">
            <p><?php createMaterialTab();
                extraTab2();?>
            </p>
        </div>
        <div class="tab-pane fade" id="pills-xtra-tab" role="tabpanel" aria-labelledby="pills-xtra">
            <p><?php
                createSupporterInfo();
                createUserInfo();
                createNotificationPanel();?>
            </p>
        </div>
    </div>



        <?php

        echo "<div class=\"row justify-content-between\">";
        echo "<input type=hidden name=sg value='" . $sg . "'>";
        echo "<input type=hidden name=id value='" . $info['id'] . "'>";
        echo "<input type=hidden name=old_supporter value='" . $info['supporter'] . "'>";
        echo "<input type=hidden name=old_pri value='" . $info['priority'] . "'>";
        echo "<input type=hidden name=old_emailgroup value='" . $info['emailgroup'] . "'>";
        echo "<input type=hidden name=old_emailstatuschange value='" . $info['emailstatuschange'] . "'>";
        echo "<input type=hidden name=old_emailcc value='" . $info['emailcc'] . "'>";
        echo "<input type=hidden name=old_status value='" . $info['status'] . "'>";
        echo "<input type=hidden name=minutes_labor value=$minutes>";
        echo "<div class=\"col align-self-start\"><input type=submit id=submit name=update height=80 value=\"$lang_updateticket\">";
        echo "</div></form";


        if ($enable_kbase == 'On') {

        echo "<form name=form2 method=post action=index.php?t=kbase&act=kadd>";
        echo "<input type=hidden name=platform value='$info[platform]'>";
        echo "<input type=hidden name=category value='$info[category]'>";
        echo "<input type=hidden name=short value='$info[short]'>";
        echo "<input type=hidden name=description value='$info[description]'>";
        echo "<div class=\"col align-self end\"><input type=submit id=submit name=dumptokb height=80 value=\"$lang_dumptokb\"></div></form>";
        }
        Echo "</div>";




        function createSupporterInfo()
        {
        global $sg, $lang_supporterinfo, $lang_supportergroup, $lang_supporter, $lang_ticket, $lang_priority, $lang_status;
        startTable("$lang_supporterinfo", "left", 100, 4);
        ECHO '                <tr>                              
							<td class=back2 align=right>' . $lang_supportergroup . '</td>
							<td class=back align="left">';
        ?> <select id="selectwidth" name=group onChange="MM_jumpMenu('parent', this, 0)"><?php
            createGroupMenu(1);
            echo '
							</select>
							</td></tr><tr>
							<td class=back2 align=right width="180Ppx">' . $lang_supporter . ' </td>
							<td class=back align="left">
                                
			
							<select id="selectwidth" name=supporter_id>';
            createSupporterMenu($sg);

            echo '				
							</select>
							</td>
                              </tr><tr>
					
							<td class=back2 align=right>' . $lang_ticket . ' ' . $lang_priority . ':</td>
							<td class=back align="left">
							
							<select id="selectwidth" name=prio>';
            createPriorityMenu(0);

            echo '
							</select>
							</td>
							</tr>';

/*            echo '<tr>

							<td class=back2 align=right>' . $lang_ticket . ' ' . $lang_status . ':</td>
							<td class=back align="left">

							<select id="selectwidth2" name=status>';
            createStatusMenu(0);


            echo '                    </select>
							</td></tr>'; */

            endTable();

            }


function createMainTab()
{

    global $id, $sg, $lang_updateticket, $lang_printable, $enable_time_tracking, $supporter_site_url, $lang_updateticket, $theme, $supporter_site_url, $cookie_name, $total_minutes, $info, $lang_ticket, $padded_id, $lang_status;
    $info = getTicketInfo($id);
    $sg = $info['groupid'];

        createTicketHeader("$lang_updateticket");
    echo '<a href="updatelog.php?cookie_name=' . $cookie_name . '&id=' .
                        $info['id'] . '" target="myWindow" onClick="window.open(\'\', \'myWindow\',\'location=no, status=yes, scrollbars=yes, height=500, width=600, menubar=no, toolbar=no, resizable=yes\')">

<img border=0 src="../' . $theme['image_dir'] . 'orangeglow0_show_summary.png"></a> ';
    echo "<div align=right><a href=\"$supporter_site_url/print.php?id=$id\">$lang_printable</a></div>";




    createTicketDetails();
    //createSupporterInfo();
    //createUserInfo();
    //createNotificationPanel();
    createTicketInfo();

}



function createTimeTab()
{
    global $enable_time_tracking, $total_minutes, $info, $minutes;

    if ($enable_time_tracking == 'On') {
        $total_minutes = displayTimeHistory();
    }

    if ($enable_time_tracking == 'On') {
        createTimeUpdate();
    }
    if ($enable_time_tracking == 'On') {

        $minutes = $total_minutes['labor_minutes'] + $total_minutes['labor_after_hours'];
    } else {
        $minutes = $info['minutes_labor'];
    }
        endTable();  // createTimeUpdate();

    }

    function createMaterialTab()
    {
        displayMaterials();
    }

    function createSupporterMenu($group_id)
    {
        global $mysql_users_table, $info, $db;

        if ($group_id == '' || !isset($group_id) || $group_id == 1 || !groupExists($group_id)) {
            $sql = "select id,user_name from $mysql_users_table where supporter=1 order by user_name asc";
            $table = $mysql_users_table;
        } else {
            $table = "sgroup" . $group_id;
            $sql = "select user_id,user_name from $table order by user_name asc";
        }

        $result = $db->query($sql, $table);

        while ($row = $db->fetch_row($result)) {
            echo "<option value=\"$row[0]\" ";
            if ($info['supporter_id'] == $row[0]) echo "selected";
            echo "> $row[1] </option>";
        }

    }

    function createNotificationPanel()
    {
        global $info, $lang_emailgroup, $lang_emailstatuschange, $lang_notification, $lang_emailcc, $lang_pagesupporter;

        startTable("$lang_notification ", "left", 100, 5);
        echo '
    <tr>
     <td class="back2" width="180px">' . $lang_emailgroup . ': </td>
     <td class="back" colspan="2">' .
            "<input class=box type=checkbox";
        if ($info['emailgroup'] == "On") {
            echo " checked";
        }
        echo "name=emailgroup></td>" .
            '</tr><tr>
     <td class="back2" width="180px">' . $lang_emailstatuschange . ': </td>
     <td class="back" colspan="2">' .
            "<input class=box type=checkbox";
        if ($info['emailstatuschange'] == "On") {
            echo " checked";
        }
        echo " name=emailstatuschange></td>" . '
    
    </tr>
    <tr>
     <td class="back2" width="180px" valign="top">' . $lang_pagesupporter . ': </td>
     <td class="back" colspan="2">' . "<input class=box type=checkbox name=mms></td>";


        echo '
    </tr>
    <tr>
     <td class="back2" width="180px">' . $lang_emailcc . ': </td>
     <td class="back" colspan="4"><input type=text size=30 name=emailcc value="' . $info['emailcc'] . '"></td></tr>';
        endTable();
    }


    function createUserInfo()
    {
        global $info, $lang_userinfo, $lang_email, $lang_username, $lang_phoneext, $lang_office;
// Get User group name and id associate with use
        $groupname = '';
        $ugroups = getUGroupList();
        $user = $info['user'];
        $n = 0;
        if ($user != '') {
            for ($i = 0; $i < sizeof($ugroups); $i++) {
                if (inGroup($user, $ugroups[$i])) {
                    $groupname .= getuGroup($i + 1) . "/";
                    $grpid_list[$n] = $i + 1;
                    $n++;
                }
            }
        }
//+++
//for ($i=0; $i<sizeof($grpid_list); $i++){
//  echo $grpid_list[$i];
//}

        startTable("$lang_userinfo     - Member of group(s): $groupname", "left", 100, 4);

        echo '			<tr>
							<td width="120px" class=back2 align=right>' . $lang_username . ':</td>
						
							<td class=back>
								<input type=text size=20 name=username value="' . $info['user'] . '">
							</td></tr><tr>
							<td class=back2 align=right>' . $lang_email . ': </td>
							<td class=back align=left>
								<input type=text size=20 name=user_email value="' . $info['email'] . '">
							</td>

						</tr>
						<tr>    
							<td class=back2 align=right>' . $lang_office . ':</td>
							<td class=back>
								<input type=text size=20 name=office value="' . $info['office'] . '">
							</td></tr><tr>

							<td class=back2 align=right>' . $lang_phoneext . ':</td>
							<td class=back>
								<input type=text size=20 name=phone value="' . $info['phone'] . '">
							</td>';

        endTable();
    }

//Thanks to SteveW for providing this great function
    function createTicketDetails()
{
        global $info, $db, $lang_never, $mysql_attachments_table, $id, $lang_ticket, $lang_opened, $lang_attachments, $lang_lastupdate, $lang_status;

        $padded_id = str_pad($id, 5, '0', STR_PAD_LEFT);
            $info['create_date'] = date("F j, Y, g:i a", $info['create_date']);
        if ($info['lastupdate'] != 0)
            $info['lastupdate'] = date("F j, Y, g:i a", $info['lastupdate']);
        else
            $info['lastupdate'] = $lang_never;
        $attachments = '';

        //if there attachments, get them and setup the links to them.
        $sql = "SELECT * from $mysql_attachments_table where tid=$id";
        $result = $db->query($sql);
        $num_attachments = $db->num_rows($result);
        if ($num_attachments > 0) {
            while ($attachment = $db->fetch_array($result)) {
                $attachment['filesize'] = convertFileSize($attachment['filesize']);
                $attachments .= "<a target=_blank href=\"../tinfo.php?action=download&id=$attachment[id]\">$attachment[filename] </a> ($attachment[filesize]) - " . date("n/j/Y", $attachment['timestamp']) . "<br>";
            }
        }

        startTable("$lang_ticket #$padded_id", "left", 100, 2, "extra");
        echo '<tr>

							<td class=back2 align=right>' . $lang_ticket . ' ' . $lang_status . ':</td>
							<td class=back align="left">
							
							<select id="selectwidth2" name=status>';
        createStatusMenu(0);


        echo '                    </select>
							</td></tr>';
        echo '
    <tr>
     <td class="back2" width="90px" align="right">' . $lang_ticket . ' ' . $lang_opened . ': </td>
     <td class="back">' . $info['create_date'] . '</td>
    </tr>
    <tr>
     <td class="back2" align="  right">' . $lang_lastupdate . ': </td>
     <td class="back">' . $info['lastupdate'] . '</td>
    </tr>
    <tr>
     <td class="back2" align="right">' . $lang_attachments . ': </td>
     <td class="back">' . $attachments . '</td>
    </tr>';
        endTable();
    }


    function resetRatingsCounter()
    {
        global $mysql_settings_table, $db;

        $sql = "update $mysql_settings_table set ticket_count=0";
        $db->query($sql);

    }

    function createTimeUpdate()
    {
        global $sg, $lang_timespent, $lang_timespent1, $lang_timespent2;
        global $lang_month, $timestamp;


// Time spent updates
        startTable("$lang_timespent", "left", 100, 4);

        echo ' <tr>
	<td width="120px" class=back2 align=right>' . $lang_timespent1 . ':
	<BR> <class=back2 align=right>' . $lang_timespent2 . '</td>';

        echo '<td class=back align="left" colspan="3">';
        echo 'Work order / reference<BR>';
        echo '<textarea  name=reference rows=3 cols=50>' . '</textarea></td>';
        echo '</tr><tr>';

        echo '<td class=back >';

        echo 'supporter<BR><select class="tkt-date" name=supporter1>';
        createSupporterMenu($sg);
        echo '</select>';
        echo '</td>';

        echo '<td width=35px class=back  colspan="1">';
        echo 'minutes<br>';
        echo '<input class="tkt-date" type=text size=6 name=time_spent></td>';

        echo '<td class=back  colspan="2">';
        echo 'Work DATE<br>';


        $today = getdate($timestamp);
        echo '<select class="tkt-date" name=womonth>';
        for ($i = 1; $i < 13; $i++) {
            echo "<option value=$i";
            if ($today['mon'] == $i)
                echo ' selected';
            echo ">" . $lang_month[$i] . "</option>";
        }

        echo '</select>
			<select class="tkt-date"  name=woday>
								<option></option>';
        for ($i = 1; $i < 32; $i++) {
            echo "<option value=$i";
            if ($i == $today['mday'])
                echo " selected";
            echo ">$i</option>\n";
        }

        echo '			
            </select>
            <select class="tkt-date" name=woyear>';
        echo "<option value=" . (string)($today['year'] - 1);
        echo '>' . ($today['year'] - 1) . '</option>';


        echo "<option value=$today[year]";
        echo ' selected';
        echo '>' . ($today['year']) . '</option>
							</select>';

        echo '</td></tr><tr>';

        echo '<td class=back colspan="2" ></td>';
        echo '<td class=back  colspan="2">';
        echo 'TIME Finished<br>';
/*

        echo '<select class="tkt-date" name=woHHend>';
        for ($i = 0; $i < 24; $i++) {
            echo "<option value=$i";
            if ($today['hours'] == $i)
                echo ' selected';
            echo ">" . $today[hours] . "</option></select>";
        }


        echo '<select class="tkt-date" name=woMMend>';
        for ($i = 0; $i < 60; $i++) {
            echo "<option value=$i";
            if ($today['minutes'] == $i)
                echo ' selected';
            echo ">" .$today[minutes].'</option></select>';  */


            echo '</td></tr><tr>';

            echo '<td width=20% class=back2 align=right>';
            echo "Labor Rate modifier</td>";

            echo '<td width=15% class=back align=left style="padding: 4px">';
            echo "<input class=box type=checkbox name=after_hours>";
            echo "AFTR-HRS";
            echo '</td>';

            echo '<td width=15% class=back align=left>';
            echo "<input class=box type=checkbox name=engineer_rate>";
            echo "SPECIAL";
            echo '</td>';

            echo '<td width=15% class=back align=left colspan=2>';
            echo '</td>';

            //endtable();
        }


        function displayMaterials()
        {
            global $id, $db;
            global $lang_materialhistory;


            startTable("$lang_materialhistory", "left", 100, 5);

            $sql = "select mat.material_id, mat.date, mat.count, mat.reference from tickets as tkt, material_track as mat where (tkt.id=mat.ticket_id AND tkt.id=$id)";
            $resultmaterials = $db->query($sql);


            while ($row = $db->fetch_array($resultmaterials)) {
                if ($row[count] != 0) {

                    $sql = "select * from tmaterial where id=$row[material_id]";
                    $result = $db->query($sql);
                    $sup_row = $db->fetch_array($result);

                    echo '<tr>
    		<td width=10% class=back2 align=right>';
                    if ($row['work_date'])
                        echo date("F j, Y", $row[date]);
                    else
                        echo "- No Date -";
                    echo '</td>';
                    echo '<td width=4% class=back>';
                    echo $row[count];
                    echo '</td>';
                    echo '<td width=15% class=back2>';
                    echo "$sup_row[ourpartnum]";
                    echo '</td>';
                    echo '<td class=back>';
                    echo "$sup_row[short]";
                    echo '</td>';
                    echo '<td class=back2>';
                    echo "$row[reference]";
                    echo '</td>';
                }
            }

            echo '<tr><td width=24% class=back2 align=right><B>Total pcs:</B>';
            echo '</td> <td class=back >';
            echo '</td> <td class=back colspan=3>';


            echo '<B>';
            echo "coming soon";
            echo '</B></td>';

            endTable();

        }

        function extraTab()
        {

            ECHO '<div class="container">
            <h1>Scheduler</h1>
            <div id="sandbox">
                <div class="row">
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
                                <a href="#" data-sort-by="foo">data-foo</a>
                            </li>
                            <li>
                            
                                <a href="#" data-sort-way="desc">text desc</a>
                            </li>
                            <li>
                                <a href="#" data-sort-by="foo" data-sort-way="desc">data-foo desc</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="container">


                    <div id="dylay" class="row">
                        <div class="col-sm-12 overhead"  data-foo="5">
                            <span style="height: 200px;">#4530<br>Short dedcription<br>line 2</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="6">
                            <span style="height: 40px;">#4320</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="3">
                            <span style="height: 40px;">#4857</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="2">
                            <span style="height: 40px;">#4858</span>
                        </div>
                        <div class="col-sm-12 overhead"  data-foo="4">
                            <span style="height: 60px;">#3567</span>
                        </div>
                        <div class="col-sm-12 consonne" data-foo="1">
                            <span style="height: 60px;">#4584</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="17">
                            <span style="height: 80px;">#4000</span>
                        </div>
                        <div class="col-sm-12 overhead"  data-foo="5">
                            <span style="height: 200px;">#4530<br>Short dedcription<br>line 2</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="6">
                            <span style="height: 40px;">#4320</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="3">
                            <span style="height: 40px;">#4857</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="2">
                            <span style="height: 40px;">#4858</span>
                        </div>
                        <div class="col-sm-12 overhead"  data-foo="4">
                            <span style="height: 60px;">#3567</span>
                        </div>
                        <div class="col-sm-12 consonne" data-foo="1">
                            <span style="height: 60px;">#4584</span>
                        </div>
                        <div class="col-sm-12 billable" data-foo="17">
                            <span style="height: 40px;">#4000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>';


        }

        function extraTab2()
        {

            ?>
            <div class="progress">

                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
                     aria-valuenow="40"
                     aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                    <span class="sr-only">40% Complete (success)</span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="20"
                     aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                    <span class="sr-only">20% Complete</span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
                     aria-valuenow="60"
                     aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                    <span class="sr-only">60% Complete (warning)</span>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="80"
                     aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete (danger)</span>
                </div>
            </div

            <?php

        }


        function materialTab()
        {
            global $lang_groupslists, $lang_groupslists2;

            startTable("$lang_groupslists", "center");
            echo "<tr><td class=cat> $lang_groupslists2 </td></tr>";
            //echo "<tr><td class=back2>";

            listGroupMembers("sgroup2");
            echo "</td></tr>";
            endTable();
            return;
        }


        function listGroupMembers($group)
        {
            global $supporter_site_url, $db, $lang_group;

            $group_id = eregi_replace("sgroup", "", $group);

            $sql = "SELECT * FROM `users`\n"
                . "INNER JOIN `sgroup2` ON `sgroup2`.`user_name` = `users`.`user_name` ";

            $result = $db->query($sql);
            startTable("$lang_group  --  " . getsGroup($group_id), "left");
            echo "<tr><td class=back>";

            echo '<div class="container">';

            echo '<div id="dylay" class="row no-gutters">';
            while ($row = $db->fetch_array($result)) {


                echo "<div class=\"col-xs-12 col-sm-6 col-md-3 " . ($row['supporter'] >= 1 ? "active" : "inactive") . "\" username=\"$row[user_name]\">";
                echo "<span style=height:60px;>";
                echo "$row[first_name] $row[last_name] <b>($row[user_name])</b><br>$row[email] " . date("m/d/Y", $row[lastactive]) . "</span></div>";

            }
            echo '</div></div></div>';
            echo "</td></tr>";
            endTable();
        }

?>