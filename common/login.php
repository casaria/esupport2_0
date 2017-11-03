<?php

/***************************************************************************************************
**	file: login.php
**
**	This file will check to see if the user is logged in already via a cookie...if not,
**	logged in, it will do the login script and set the cookie so the user can login.
**	The cookie will be checked against all of the remaining pages that require login.php.
**
**	Note:  This file needs to be required of all pages that require a user to be logged in.
**
***************************************************************************************************
	**
	**	author:	JD Bottorf
	**	date:	08/10/01
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
require_once "config.php";
//set the start time so we can calculate how long it takes to load the page.
$mtime1 = explode(" ", microtime());
$starttime = $mtime1[0] + $mtime1[1];
$username ='';
$password ='';
$referer ='';
//require_once "../common/common.php";

if(eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF)) {
   require_once "../lang/$default_language.lang.php"; 
   $login_logo ="../images/casariadefault/small-header-brown.gif";
}
else {
	require_once "lang/$default_language.lang.php";
	$login_logo = "images/casariadefault/small-header-brown.gif";
}


$cookieuser = '';
//common.php
session_status() === PHP_SESSION_ACTIVE  ? $cookieuser = '' : startSession();

$cookie_name = $_SESSION['cookie_name'];
//echo "cookie_name = $cookie_name <br>";
//echo "session ID =" . session_id(). " <br>";
//if submit has been hit, set the cookie and reload the page immediately so the cookie takes effect.
if(isset($login))
{
    $username  = strtolower (trim($_POST['user'],"((?=^)(\s*))|((\s*)(?>$))"));
    $password = trim ($_POST['password'],"((?=^)(\s*))|((\s*)(?>$))");
    $referer = strtolower (trim($HTTP_REFERER,"((?=^)(\s*))|((\s*)(?>$))"));
	//if admin is contained in the url, we need to make sure the user is an
	//admin before letting them login.
	if(ereg("/admin", $referer)){
		//check the user name and password against the database.
		if(checkUser($username, md5($password))){
			if(isAdministrator($username)){
				$cookie_name = $username;
				//session_register ("cookie_name");
				$_SESSION ["cookie_name"] = $cookie_name;
				$enc_pwd = md5($password);
				//session_register ("enc_pwd");
				$_SESSION ["enc_pwd"] = $enc_pwd;

				//nov14 header("Location: $referer");
			}
			else{
				echo $lang_notadmin;
				exit;
			}
		}
		else{
			echo $lang_wronglogin;
			exit;
		}

	}

	elseif ( (ereg("/supporter", $referer))  ){
		//check the user name and password against the database.
		if(checkUser($username, md5($password))){
			if(isSupporter($username)){
				$cookie_name = $username;
				//session_register("cookie_name");
				$_SESSION ["cookie_name"] = $cookie_name;
				$enc_pwd = md5($password);
				//session_register("enc_pwd");
				$_SESSION ["enc_pwd"] = $enc_pwd;

				//nov14 header("Location: $referer");
				setcookie('supporter_usercookie', $cookie_name,  time()+ 60*60*24*7);
				setcookie('supporter_pwdcookie', $password,  time()+ 60*60*24*7);
				
			}
			else{
				echo $lang_notsupporter;
				exit;
			}
		}
		else{
			echo $lang_wronglogin;
			exit;
		}

	}

	//otherwise, the user is not logging in to the admin site.
	else{
		//check the user name and password against the database.
		if(checkUser($username, md5($password))){
				$cookie_name = $username;
				//session_register ("cookie_name");
				$_SESSION ['cookie_name'] = $cookie_name;
				$enc_pwd = md5($password);
				//session_register ("enc_pwd");
				$_SESSION ['enc_pwd'] = $enc_pwd;

				//nov14 header("Location: $referer");
				//echo"<BR>$cookie_name $enc_pwd";
				setcookie('cookieuser', $cookie_name,  time()+ 60*60*24*7);
				setcookie('cookiepwd', $password,  time()+ 60*60*24*7);
		}
		else{
			echo $lang_wronglogin;
			exit;
		}
	}

}

//check the cookie first.
if(!isSet($_SESSION ['cookie_name'])){
	if(eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF))
		$sup = 1;
	else
		$sup = 0;

	require_once $includePath."style.php";
if (isset($_COOKIE['supporter_usercookie'])) 
   $cookieuser = $_COOKIE['supporter_usercookie'];
if (isset($_COOKIE['supporter_pwdcookie'])) 
   $cookiepwd = $_COOKIE['supporter_pwdcookie'];


echo 
'<script language="JavaScript">
	function setfocus(){
		document.login.user.focus();
	} </script>';

echo'
</head>
<body bgcolor='.$theme['bgcolor'].' onload="setfocus()">
<form name=login method=post>
<TABLE class=border cellSpacing=0 cellPadding=20 width='.$theme['width'].' align=center border=0>
  <TR>
    <TD>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" align="center" border=0>
      
        <TR>
          <TD class=back align=center></TD>
          <TR></TR>
        </TR>
        <TR>
          <TD class=back>
			<TABLE border=0 width="100%" align="center">
              <TR></TR><tr>
                  <TD class=back vAlign="top" align="center">
<div class="container-login" align="center">
<TABLE class=border cellSpacing=0 cellPadding=5  align=center border=0	>
  <TR>
    <TD>
    
    </TD></TR>
    <TR><TD>
     	
      <TABLE style="margin:6px; Padding:0px; width=100%" align="center">
        <TR
          
        </TR>
    
  
    
          <TD class="back2" style="margin:10px" align="center"> <IMG SRC='."$login_logo".'>
        <TR>
        </TR>
        <TR>
          <TD class=back2>
			<table width=100% border=0 cellspacing=0 cellpadding=0>
				<tr>
				 <td class=back2 align=right>'.$lang_username.':</td><td>
					<input type=text name=user class="text-login" value='."$cookieuser".'></td>
				</tr>
				<tr>
				 <td class=back2 align=right>'.$lang_password.':</td><td>
					<input type=password name=password class="text-login" value="'.$cookiepwd.'"></td>
				</tr>
				<tr>
				 	<td class=back2 align=right></td><td>
					<input type=submit class="btn-login" name=login value="'.$lang_submit.'"></td>
				</tr>
			</table>


		  </TD>
		</TR>
	  </TABLE>
	 
	 </TD>
	</TR>

</TABLE> </div>';

if($pubpriv == 'Private'){
	echo '<br><div align=center>[ <a href="'.$site_url.'/index.php?reg=yes">'.$lang_registerforaccount.'</a> ]</div>';
}
echo '
<BR>
				
				</TD>
              </TR>
            </TABLE>
		  </TD>
		</TR>
	  </TABLE>
	 </TD>
	</TR>
</TABLE>
 </TD>
</TR>
</TABLE>
 </TD>
</TR>
</TABLE>
</TD>
</TR>
</TABLE>
</form>

';

        if(eregi("supporter", $PHP_SELF) || eregi("admin", $PHP_SELF))
                require "../common/footer.php";
        else
                require "common/footer.php";

        exit;

}
else{
		
	//if submit has not been pressed, check the cookie against the database.
	if(ereg("/supporter/i", $PHP_SELF) && !isSupporter($cookie_name) && $cookie_name != ''){
		echo "$lang_notsupporter";
		exit;
	}

	if(preg_match("/admin/i", $PHP_SELF) && !isAdministrator($cookie_name) && $cookie_name != ''){
		echo "$lang_notadmin";
		exit;
	}

}
//get some globals about the user
 $user_id = getUserId($cookie_name);
 $ugID_list = getUsersGroupIDList($user_id);

//this returns back to the page that called it.
?>
