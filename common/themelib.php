<?php
/**
 * Created by PhpStorm.
 * User: horra
 * Date: 12/4/2017
 * Time: 4:08 AM
 */

function getThemeVars($name)
{
    global $mysql_themes_table, $db;

    if ($name == '') {
        return 'default';
    } else {
        $sql = "select * from $mysql_themes_table where name='$name'";
        $result = $db->query($sql);
        //$result = execsql($sql);
        $row = $db->fetch_array($result);

        return $row;
    }

}

/******************************************************************==*****************************************
 **    function getThemeName():
 **        Takes one argument.  Queries the database and selects the theme associated with the user name that
 **    is given.  Returns the file path of the css file.
 ***********************************************************************************************************
 * @param $name
 * @return
 */
function getThemeName($name)
{
    global $mysql_users_table, $mysql_settings_table, $default_theme, $db;

    if ($name == '' || !isset($name)) {
        return $default_theme;
    } else {
        $sql = "select theme from $mysql_users_table where user_name='$name'";
        $result = $db->query($sql);
        //$result = execsql($sql);
        $row = $db->fetch_array($result);

        if ($row[0] == 'default') {    //if users theme is set to default, get the default theme from the db
            $sql = "select default_theme from $mysql_settings_table";
            $result = $db->query($sql);
            $row = $db->fetch_array($result);
        }

        return $row[0];
    }

}
