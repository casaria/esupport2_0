
<?php
/***********************************************************************************************************
**
**	file:	config.php
**
**	This file contains all variables associated with mysql.
**
************************************************************************************************************/

$base_dir  = __DIR__; // Absolute path to your installation, ex: /var/www/mywebsite
$doc_root  = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # ex: /var/www
$base_url  = preg_replace("!^${doc_root}!", '', $base_dir); # ex: '' or '/mywebsite'
$protocol  = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$port      = $_SERVER['SERVER_PORT'];
$disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
$domain    = $_SERVER['SERVER_NAME'];
$full_url  = "${protocol}://${domain}${disp_port}${base_url}";
$remote_ip = $_SERVER['REMOTE_ADDR'];



/**********************************************************************************************************/
/****************************	 Variables	***********************************************************/
if (preg_match('/support/i',$domain)) {

    $database = "mysql";                    //database (mysql is the only one available
    $server_gmt_offset = -5; //Timezone GMT -5
    $db_host = 'localhost';
    $db_user = 'casaria_hdesk1';
    $db_pwd = '26XwoR]B';
    $db_name =  'support';  #'hostgo_hdesk1';
    $uploaddir = '/var/www/casaria/support/uploads/';
    $session_time = 3600;
    $session_name = 'CasariaIncSupport';
    $MailQueuePath = "/var/www/casaria/support/MAILQUEUE/";
} else {

    $database = "mysql";                    //database (mysql is the only one available
    $server_gmt_offset = -5; //Timezone GMT -5
    $db_host = 'localhost';
    $db_user = 'casaria_hdesk1';
    $db_pwd = '26XwoR]B';
    $db_name = 'eval';  #'casaria_hdesk';
    $uploaddir = '/var/www/casaria/esupport2_0/uploads/';
    $session_time = 1800;
    $session_name = 'EVALCasaria';
    $MailQueuePath = '/var/www/casaria/esupport2_0/MAILQUEUE/';
    $includePath = '/var/www/casaria/esupport2_0/common/';
}
/*********	You shouldn't need to change anything below here.	***********************************/
/**********************************************************************************************************/
/**********************************************************************************************************/



if (!isset($cookie_name)) $cookie_name='';


$mysql_crmsettings_table = "crmsettings";
$mysql_tequipment_table = "tequipment";
$mysql_BillingStatus_table = "tBillingStatus";

$mysql_announcement_table = "announcements";	//mysql announcement table name
$mysql_tcategories_table = "tcategories";		//mysql ticket categories table
$mysql_tpriorities_table = "tpriorities";		//mysql ticket priority table
$mysql_tstatus_table = "tstatus";				//mysql ticket status table
$mysql_tratings_table = "tratings";				//mysql ticket rating table
$mysql_users_table = "users";					//mysql users table
$mysql_sgroups_table = "sgroups";				//mysql supporter group table
$mysql_ugroups_table = "ugroups";				//mysql users group table
$mysql_faqcat_table = "faqcategories";			//mysql faq categories table
$mysql_faqsubcat_table = "faqsubcategories";	//mysql faq sub-categories table
$mysql_faqs_table = "faqs";						//mysql faq question and answer table
$mysql_platforms_table = "platforms";			//mysql platforms table
$mysql_tickets_table = "tickets";				//mysql tickets table
$mysql_settings_table = "settings";				//mysql settings table
$mysql_themes_table = "themes";					//mysql themes table
$mysql_time_table = "time_track";				//mysql table for keeping track of time spent on a ticket
$mysql_whosonline_table = "whosonline";			//mysql whosonline table
$mysql_survey_table = "survey";					//mysql survey table
$mysql_kcategories_table = "kcategories";		//mysql knowledge base categories table
$mysql_kbase_table = "kbase";					//mysql knowledge base table that holds q & a's
$mysql_attachments_table = "attachments";		//mysql attachments table
$mysql_templates_table = "templates";			//mysql templates table
$mysql_kb_queries_table = "kb_queries";			//mysql knowledge base queries table

/**********************************************************************************************************/
/**********************************************************************************************************/


/**********************************************************************************************************/
/**********************************************************************************************************/
/**		This takes care of the global variables being set to off by default in php 4.2.0 and above.		***/
/**********************************************************************************************************/
/**********************************************************************************************************/

if(phpversion() >= "4.2.0"){
	if(is_array($_SERVER)){
		extract($_SERVER, EXTR_PREFIX_SAME, "server");
	}
	if(is_array($_GET)){
		extract($_GET, EXTR_PREFIX_SAME, "get");
	}
	if(is_array($_POST)){
		extract($_POST, EXTR_PREFIX_SAME, "post");
	}
	if(is_array($_COOKIE)){
		extract($_COOKIE, EXTR_PREFIX_SAME, "cookie");
	}
	if(is_array($_FILES)){
		extract($_FILES, EXTR_PREFIX_SAME, "file");
	}
	if(is_array($_ENV)){
		extract($_ENV, EXTR_PREFIX_SAME, "env");
	}
	if(is_array($_REQUEST)){
		extract($_REQUEST, EXTR_PREFIX_SAME, "request");
	}
/*	if(is_array($_SESSION)){
		extract($_SESSION, EXTR_PREFIX_SAME, "session");

	}
	*/
}

?>
