
<?php
/**************************************************************************************************
 *
**	file:	index.php
**
**		This is the index file that provides access to the rest of the site basically.  Mostly html
**	code.  This file consists mainly of links to other parts of the helpdesk.
**
***************************************************************************************************
	**
	**	author:	JD Bottorf
	**	date:	09/19/01
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
ob_start(null,0, PHP_OUTPUT_HANDLER_FLUSHABLE|PHP_OUTPUT_HANDLER_CLEANABLE|PHP_OUTPUT_HANDLER_REMOVABLE);
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];



require_once $_SERVER['DOCUMENT_ROOT']."/common/config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/common/mysql.class.php";
require_once $_SERVER['DOCUMENT_ROOT']."/common/common.php";

/*
startSession();
$cookie_name = $_COOKIE['supporter_usercookie'];
//$cookie_name = $_COOKIE['supporter_usercookie'];

if($pubpriv == 'Private') {
    if (($session_id !== session_id()) || (!$cookie_name) || ($cookie_name == '')) {
    $myUrl =  "${protocol}://${domain}/common/login.php";
        header("location: $myUrl");
    }
}*/
$cookie_name = $_COOKIE['supporter_usercookie'];
ob_end_clean();
authenticate();
RewindSession();
?>


<link rel="apple-touch-icon" sizes="120x120" href="/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
<link rel="manifest" href="/img/manifest.json">
<link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">


<script type="text/javascript">
function winPop(url)
{
  if (url) {
    var w=window.open(url,'newWin');
    w.focus();
 }   
}
</script>
        
<?php
$language = getLanguage($cookie_name);
//global $hidemenu;

if($language == '')
	require_once "../lang/$default_language.lang.php";
else
	require_once "../lang/$language.lang.php";

require_once "../common/style.php";

if($enable_helpdesk == 'Off'){
	printerror($on_off_reason);
	exit;
}

if($pubpriv == "Private"){	//generate a list of people waiting to be approved.
	$sql = "SELECT * from $mysql_users_table where user=0";
	$result = $db->query($sql);
	$i=0;
	while($row = $db->fetch_array($result)){
		$awaiting_approval[$i] = "<a href=\"$admin_site_url/control.php?t=users&act=uedit&id=$row[id]\">$row[user_name]</a>";
		$i++;
	}
}
 $time_offset = getTimeOffset($cookie_name);
if(isset($cookie_name)){
	//update the lastactive time in the database.
	$sql = "UPDATE $mysql_users_table set lastactive='".time()."' where user_name='".$cookie_name."'";
	$db->query($sql);
}
$last_active = getLastActiveTime($cookie_name);
$user_info = getCredentialsArray($cookie_name);
$enable_CloudControl = getCloudControlUserSetting($_SESSION['cookie_name']);


?>
<BODY class=body>
<TABLE class=border cellSpacing=0 cellPadding=0 width="<?php echo $theme['width']; ?>" align=center
border=0>
  <TBODY> 
  <TR> 
    <TD> 
      <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0>
        <TBODY> 
        <TR> 
          <TD class=hf align=right>
    			<?php echo "$lang_loggedinas <i>$cookie_name</i> (<A class=hf href=\"../common/logout.php\"> $lang_logout</a>)";
			 echo " $crm_name"; ?>
		 </TD>
        </TR>
        <TR> 
          <TD class=back align=left> <IMG SRC="../<?php echo $theme['image_dir'].$theme['logo_path']; ?>">
          

            <?php 
    if (!$hidemenu) 
    {        
            echo '

     <!---  <div data-role="panel" id="mypanel">
        <!-- panel content goes here -->


            <TABLE width="100%" align=center border=0>
              <TBODY> 
              <TR> 
                <TD vAlign=top width="200"> 
                
         

 
                      
                  <TABLE class=border cellSpacing=0 cellPadding=0 width="100%" 
                  align=center border=0>
                    <TBODY> 
                    <TR> 
                      <TD> 
                        <TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
                          <TBODY> 
                          <TR> 
                            <TD class=info align=center><B>';
                             echo $lang_Supporter . " " . $lang_options; 
                             echo '
                             </B></TD>
                          </TR>
                          <TR> 
                            <TD class=cat><B><?php echo $lang_adminlink; ?></B></TD>
                          </TR>
                          <TR> 
                            <TD class=subcat> 
                              <form name=timelink method="post" action="https://cbb.casaria.net">';
                                 echo "<input type=hidden name=login value=$user_info[email]>
                                 <input type=hidden name=md5 value=$user_info[password]>";
                                 echo '<LI><a href="#" onclick="javascript:document.timelink.submit();">CBB Casaria Bulletin Board</a></LI>
                              </form>	
                               <form novalidate name="login_form" id="login_form" action="https://www.casaria.net:2095/horde/index.php" method="post"  style="visibility:">';
                                //<form name=emaillink method="post" action="https://www.casaria.net:2095/horde/index.php">';
                                 echo "<input type=hidden name=user id=user value=$user_info[email]>
                                 <input type=hidden name=pass id=pass value=$user_info[password]>";
                                 echo '<LI><a href="#" onclick="javascript:document.login_form.submit();">'; echo $lang_lnk_email;
                                 echo '</a></LI>';
								echo '</form>';
								echo "<LI><a href='https://odoo.casaria.net/web/login'>$lang_lnk_odoo</a></LI>";
                           echo'               
                            </TD>
                          </TR>
                            <TD class=cat><B>';
                            echo $lang_ticket . " " . $lang_options; echo '</B></TD>';
                          
                          echo '</TR>
                          <TR> 
                            <TD class=subcat>'; 
                              echo '<LI><A href="index.php?t=tcre">'; echo $lang_create . " " . $lang_ticket; echo '</A>'; 
                              echo '<LI><A href="index.php?t=tmop&f=normal">'; echo $lang_myopen; echo '</A></LI>';
                              echo '<LI><A href="index.php?t=tmre">'; echo $lang_myrecent; echo '</A></LI>';
                              echo '<LI><A href="index.php?t=tmgo&f=normal">'; echo $lang_mygroups; echo '</A></LI>'; 
                              echo '<LI><A href="index.php?t=tmgo&f=closed">'; echo $lang_groupticketsclosed; echo '</A></LI>'; 
                              echo '<LI><A href="index.php?t=tmgo&f=closed_recent">'; echo $lang_groupticketsclosedrecent; echo '</A></LI>';

                              echo '<LI><A href="index.php?t=tmgo&f=hold">'; echo $lang_myholds; echo '</A></LI>'; 
                              
                              echo '<LI><A href="index.php?t=tsrc">'; echo $lang_searchforticket; echo '</A></LI>';
                              echo '<br><form name=formTicketSearch action="index.php" method=get>
                                    <input type=hidden name=t value=tupd>';
                                    echo $lang_ticket; echo ' # : <input type=text name=id size=5>
                                    <a href="#" onClick="javascript:document.formTicketSearch.submit();">';  echo $lang_go; echo'!</a>';
                              echo'      
                                  </form>
                            </TD>
                          </TR>';
                          

                          
                              if($enable_kbase == 'On'){
                                  echo '<TR> 
                                           <TD class=cat><B>'.$lang_faqopts.'</B></TD>
                                        </TR>
                                        <TR> 
                                           <TD class=subcat> 
                                               <LI><A href="index.php?t=kbase">'.$lang_kbase.'</A></LI>
                                               <LI><A href="index.php?t=kbase&supkb=yes">'.$lang_Supporter . ' ' . $lang_kbase.'</A></LI>
                                               <LI><A href="index.php?t=kbase&act=kadd">'.$lang_addtokb.'</A></LI>
                                               <LI><A href="index.php?t=kbase&act=ksta">'.$lang_kbstats.'</A></LI>
                                               <LI><A href="index.php?t=execute&act=fixit">'.'DO NOT TOUCH 1'.'</A></LI>
                                               <LI><A href="index.php?t=c&act=dylay">'.'DO NOT TOUCH 2'.'</A></LI>
                                           </TD>
                                        </TR>';
                              }
			                    echo '
                          <TR> 
                            <TD class=cat><B>'; echo $lang_Supporter . " " . $lang_options; echo '</B></TD>';
                          echo'
                          </TR>
                          <TR> 
                                
                            <TD class=subcat>'; 
                              echo '<LI><A href="index.php?t=epro">'; echo $lang_editprofile; echo '</A></LI>';
                              echo '<LI><A href="index.php?t=sgrp">'; echo $lang_viewgroups; echo '</A></LI>';
                          echo '
                            </TD>
                          </TR>';

   
   												if($enable_CloudControl == 'On'){
   													echo '<TR>
   													<TD class=cat><B>' . $lang_CloudControl . '</B></TD>
   													</TR>
   													<TR>
   													<TD class=subcat>
   																<LI><A href="index.php?t=cccheater">' . $lang_ccc_waterheater . '</A></LI>
   		   													<LI><A href="index.php?t=ccccontrol">' . $lang_ccc_control  . '</A></LI>   
   													</TD>
   													</TR>';
   												}
                          
                            if (isAdministrator($cookie_name)){
                                echo "<TR> 
                                        <TD class=cat><B>".$lang_reporting."</B></TD>
                                      </TR>
                                      <TR> 
                                        <TD class=subcat> 
                                        <LI><A href=\"index.php?t=tstats\">".$lang_ticketstats."</A></LI> 
                                        <LI><A href=\"index.php?t=slist\">".$lang_supporterstats."</A></LI>";

                                if($enable_ratings == 'On'){
                                     echo  "<LI><A href=\"index.php?t=tsur\">".$lang_surveystats."</A></LI>";
                                }

                                echo "<LI><A href=\"index.php?t=gstats\">".$lang_groupstats."</A></LI> ";

                                if($enable_time_tracking == 'On'){
                                     echo '<LI><A href="index.php?t=time">'.$lang_timetracking.'</A></LI>';
                                }
                            }
                                     echo "</TR>";

                          
                        echo '
                            </TD>
                          </TR>
                         </TBOD
                         </TBODY> 
                        </TABLE>
                      </TD>
                    </TR>
                    </TBODY> 
                  </TABLE>';
            ?><!-- /panel </DIV>  -->

<!-- header -->
<!-- content -->
<!-- footer -->
<?php

                
                        
//this is ugly, but it works...i'll clean it up later.
//if the admin is logged in, display a list of people/users who are awaiting approval.
if (isAdministrator($cookie_name) && $awaiting_approval){

  	echo '<br><TABLE class=border cellSpacing=0 cellPadding=0 width="100%" 
                  align=center border=0>
                    <TBODY> 
                    <TR> 
                      <TD> 
                        <TABLE cellSpacing=1 cellPadding=5 width="100%" border=0>
                          <TBODY> 
                          <TR> 
                            <TD class=info align=center><B>'; echo $lang_awaitingapproval; echo   '</B></TD>';
                          echo '  
                          </TR>
                          <TR> 
                            <TD class=back2><B>';
							
								for($i=0; $i<sizeof($awaiting_approval); $i++){
									echo $awaiting_approval[$i] . "<br>";
								}
							echo '</B></TD>
						  </tr>
					  </table>
					  </td></tr></table>';
                 }

                echo '</TD>
                <TD vAlign=top>
                
       </div>'; //<!-- page -->
  

    } else $getstats=true;


    switch ($t) {
        case ("tcre"):
            require "tcreate.php";
            break;
        case ("tmop"):
            require "myopen.php";
            break;
        case ("tmgo"):
            require "mygroupopen.php";
            break;
        case ("tmre"):
            require "myrecent.php";
            break;
        case ("tsrc"):
            require "tsearch.php";
            break;
        case ("tupd"):
            require "tupdate.php";
            break;
        case ("epro"):
            require "../editprofile.php";
            break;
        case ("sgrp"):
            require "sgroups.php";
            break;
        case ("kbase"):
            switch ($act) {
                case("kedit"):
                    require "../kbase/edit.php";
                    break;
                case("kadd"):
                    require "../kbase/add.php";
                    break;
                case("kans"):
                    require "../answer.php";
                    break;
                case("ksta"):
                    require "../kbase/kbstats.php";
                    break;
                default:
                    require "../kbase.php";
                    break;
            }
            break;
        case("terr"):
            printError("$lang_missing_info");
            break;
        case("execute"):
            //fixticketSeptember30(4996, 5051);
            //fixUgroupsTable();
            break;
        case("schedule"):
            //fixticketSeptember30(4996, 5051);
            //fixUgroupsTable();
            require "sched.php";
            break;
        case ("memb"):
            require "member.php";
            break;
        case ("tstats"):
            require "../admin23/tstats.php";
            break;
        case ("tsur"):
            require "../admin23/sstats.php";
            break;
        case ("gstats"):
            require "../admin23/gstats.php";
            break;
        case ("tsuc"):
            showSubmitResult(TRUE, $id);
            break;
        case ("slist"):
            require "../admin23/slist.php";
            break;
        case ("time"):
            require "../admin23/timedetailed.php";
            break;
        case("cccheater"):
            require "../CCC/jheater.php";
            break;
        case("ccccontrol"):
            require "../CCC/jcontrol.php";
            break;
        case ("uedit"):
            require "../admin23/uedit.php";
            break;
        case("repo"):
            require "../kbase/report.php";
            break;
        default:
            require "announce.php";
            break;
    }

    ?>
				
              </TR>
              </TBODY> 
            </TABLE>
            <BR>
          </TD>
        </TR>
		<?php
		
		if($enable_whosonline == 'On'){
			echo "<TR>
				<TD class=cat>";
					require_once "../common/whosonline.php";
			echo "</td>
				</tr>";
		}
		
		?>
        <TR> 
          <TD class=hf align=center>
		  <?php

		  echo '
            <div align="center">
			<A class=hf href="'.$supporter_site_url.'/index.php">'.$lang_home.'</A> |&nbsp;';
			if(isAdministrator($cookie_name)){
				echo '<A class=hf href="'.$admin_site_url.'/control.php">'.$lang_cp.'</a> |&nbsp;';
			}
			if($enable_forum == 'On'){
				echo '<A class=hf href="'.$forum_site_url.'" target=_blank>'.$lang_forum.'</A> |&nbsp;';
			}
			echo '
			<A class=hf href="../common/logout.php';
				if($enable_ssl == 'On'){
					echo "?ssl=1";
				}
				echo '">'.$lang_logout.'</A> 
			</div>';
			?>


          </TD>
        </TR>
        </TBODY> 
      </TABLE>


<?php

require "../common/footer.php";

?>

</BODY>

</HTML>