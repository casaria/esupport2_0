<?php

/***************************************************************************************************
**	file: logout.php
**
**	This file logs out the currently logged in user by destroying all of the session variables and
**	then deleting the session.
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
require_once "$database.class.php";
require_once "common.php";

//session_start();


//if (isset($_COOKIE[session_name()])) {
    setcookie("session_id", session_id(), time() - $session_time, '/', 'casaria.net');
    if (isset($_COOKIE['cookieuser'])) setcookie("cookieuser", $cookie_name, time() - 3600, '/', 'casaria.net');
    if (isset($_COOKIE['supporter_usercookie'])) setcookie("supporter_usercookie", $cookie_name, time() - 3600, '/', 'casaria.net');
    $cookie_name='';
//session_set_cookie_params(600,'/', '.casaria.net',0,0);



startSession();

$_SESSION = array();

session_unset();

session_destroy();

$myUrl =  "${protocol}://${domain}/index.php";
    header("location: $myUrl");
    exit;



