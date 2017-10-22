<?php

/***************************************************************************************************
 **
 **    file: style.php
 **
 **        This file contains the style sheet.
 **
 ****************************************************************************************************
 **
 **    author:    JD Bottorf
 **    date:    12/23/2001
 **
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


//if the user is not logged in, set the default style sheet.
//otherwise, grab the selected theme from the database.
$theme = getThemeVars(getThemeName($cookie_name));

$tablePadding = 6;


?>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/common/bootstrap.css" media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../dylay/assets/vendor/jquery.easing.1.3.js"></script>
    <script src="../dylay/src/dylay.js"></script>
    <script src="../dylay/assets/js/main.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Titillium Web:300:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../dylay/assets/css/main.css" media="screen">


    <script type="text/javascript">
        WebFontConfig = {
            google: {families: ['Roboto::latin', 'Lato::latin', 'Roboto+Condensed::latin', 'Ropa+Sans:latin', 'Titillium+Web:500,600,700,800:latin']}
        };

        (function () {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>


    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <HTML>
    <HEAD>


        <TITLE> <?php echo $helpdesk_name; ?></TITLE>
        <?php
        if ($theme['font'] == "Titillium Web") {
            $lineHeight = 1.2;
            $tablePadding = 5;
        } else {
            $lineHeight = 1.1;
            $tablePadding = 3;

        } ?>

        <STYLE type="text/css">

            .container {
                padding-right: 2px;
                padding-left: 2px;
                margin-right: 2px;
                margin-left: 2px;
                width: 80%;
            }


            @import url(https://fonts.googleapis.com/css?family=Lato);

            /*### Smartphones (portrait and landscape)(small)### */
            @media screen and (min-width : 0px) and (max-width : 767px){
                /*Base Mobile Layout*/
                .wrap {
                    /*width: 50%;  */
                    margin: 0 auto;
                    zoom: 0.25;
                }

                .tabbox {
                    padding-right: 1px;
                    padding-left: 1px;
                    margin-right: 1px;
                    margin-left: 1px;
                }


                table {
                    -webkit-border-horizontal-spacing: 2px;
                    -webkit-border-vertical-spacing: 1px;
                    font-weight: 500;
                    padding: 0px;
                }

                #selectwidth {
                    background-color: #afe7f7;
                    border: 0 solid;
                    Vbackground-color: <?php echo $theme['subcategory']; ?> border: 2px solid;
                    -webkit-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 200px;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;

                    /* background: transparent;
                     padding: 5px 10px 5px 5px;
                     font-size: 16px;
                     border: 1px solid #f4a62b;
                     height: 34px;
                     -webkit-appearance: none;
                     -moz-appearance: none;
                     appearance: none;
                     background: url(http://www.stackoverflow.com/favicon.ico) 96% / 15% no-repeat */
                }

                #selectwidth2 {
                    background-color: <?php echo $theme['category']; ?>;
                    border: 0 solid;
                    -webkit-box-shadow: #B4B5B5 3px 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 200px;
                    font-weight: 600;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;

                }

                #selectwidth option, #selectwidth2 option {

                    width: 200px;
                    font-weight: 600;
                    color: darkslateblue;
                    padding: 5px;
                    font-size: 13px;
                }

                /*

                                  #submit {
                                      width: 21px;
                                      height: 21px;
                                      border:  10px;
                                      margin: 10px;
                                      padding: 6px;
                                      background: #feaa37 url(../images/casariadefault/log_button.jpg) 10 10 no-repeat;
                                      font-weight:600;
                                      color: darkslateblue;
                                      list-style-type: circle;
                                      font-size: 13px;
                                      -moz-border-radius: 3px;
                                      -webkit-border-radius: 3px;


                                  }*/

                input[type=text], textarea, select {
                    width: 200px;
                    border: 2px solid #67bcd1;
                    -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                    -moz-box-shadow: #B4B5B5 3px 3px 3px;
                    box-shadow: #B4B5B5 3px 3px 3px;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    border-radius: 3px;
                    font-size: 13px;
                    padding: 2px 2px 2px 2px;
                    text-decoration: none;

                    display: inline-block;
                    text-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
                    font-weight: bold;
                    color: darkslateblue;
                    background-color: <?php echo $theme['bg2']; ?>;
                    /*
                    background-color: #AFE7F7; background-image: -webkit-gradient(linear, left top, left bottom, from(#AFE7F7), to(#90CDDD));
                    background-image: -webkit-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -moz-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -ms-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -o-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: linear-gradient(to bottom, #AFE7F7, #90CDDD)
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffc579, endColorstr=#fb9d23);

                    */
                }



                input[type=text]:hover, textarea:hover, select:hover {
                    /* border: 2px dashed #ff9913; */
                    background-color: #ffaf46;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffaf46), to(#e78404));
                    background-image: -webkit-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -moz-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -ms-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -o-linear-gradient(top, #ffaf46, #e78404);
                    background-image: linear-gradient(to bottom, #ffaf46, #e78404);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffaf46, endColorstr=#e78404);
                }

                .small{
                    width: 100px;

                }


                button, input[type=submit] {
                    border-top-color: #67bcd1;
                    border-right-color: #67bcd1;
                    border-bottom-color: #67bcd1;
                    border-left-color: #67bcd1;
                    border-width: 2px;
                    border-style: solid;
                    -webkit-box-shadow: #797991 1px 1px 1px;
                    -moz-box-shadow: #797991 1px 1px 1px;
                    box-shadow: #797991 1px 1px 1px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                    font-size: 16px
                    padding: 6px 6px 6px 6px;
                    font-weight: 600;
                    text-decoration: none;
                    display: inline-block;
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
                    color: #FFFFFF;
                    background-color: #92cfde;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffaf46), to(#e78404));
                    background-image: -webkit-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -moz-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -ms-linear-gradient(top, #ffaf46, #e78404);
                    background-image: -o-linear-gradient(top, #ffaf46, #e78404);
                    background-image: linear-gradient(to bottom, #ffaf46, #e78404);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#92cfde, endColorstr=#76bdd1);
                }

                button:hover, input[type=submit]:hover {
                    border-top-color: #44adc6;
                    border-right-color: #44adc6;
                    border-bottom-color: #44adc6;
                    border-left-color: #44adc6;
                    border-width: 2px;
                    border-style: solid;
                    background-color: #6bbed2;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#6bbed2), to(#50abc4));
                    background-image: -webkit-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -moz-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -ms-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -o-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: linear-gradient(to bottom, #6bbed2, #50abc4);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#6bbed2, endColorstr=#50abc4);
                }
                BODY {
                    background: <?php echo $theme['bgcolor'];?>;
                    color: black;
                    font-weight: 600;
                }

                a:link {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                    font-weight: 600;
                }

                a:visited {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                }

                a:active {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                }

                a:hover {
                    text-decoration: underline;
                    color: <?php echo $theme['link']; ?>;
                }

                a.kbase:link {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:visited {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:active {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:hover {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                /*table.border {
                    background: <?php echo $theme['table_border']; ?>;
                    color: black;
                } */

                td {
                    color: #000000;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                tr {
                    color: #000000;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                td.back {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                td.back2 {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                td.printback {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['print_bg']; ?>;
                }

                td.date {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size'];?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.hf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.printhf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['print_header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_header_text']; ?>;
                }

                a.hf:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                .alternate tr:nth-child(2n+0) {
                    background-color: <?php echo $theme['bg1']; ?>;
                }

                .alternate tr:nth-child(2n+0):hover, .alternate tr:hover {
                    background-color: #E7FF00;
                }

                .alternate tr:nth-child(2n+2) {
                    background-color: <?php echo $theme['bg2']; ?>;
                }

                .alternate tr:nth-of-type(1) {
                    background-color: <?php echo $theme['bg1']; ?>;
                    padding: 20px;
                    font-size: 22px
                }

                tr.back {
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                tr.back2 {
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                tr.back3 {
                    line-height: <?php echo $lineHeight; ?>;
                    background: #feaa37;
                    font-weight: 600;
                }
        /*table tr:nth-child(odd) tr{background:

         }
        table tr:nth-child(even) tr{background:


        }
        */
                td.back {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                td.back2 {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                td.printback {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['print_bg']; ?>;
                }

                td.date {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size'];?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.hfo {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.hf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: #c9caea;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-weight: 600;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.printhf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['print_header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_header_text']; ?>;
                }

                a.hf:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-weight: 600;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: #9907c1;
                }

                /* 00c6ff , a34bc6*/
                a.hf:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.info:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.hf:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }


                td.info {
                    text-align: left;
                    background: <?php echo $theme['info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo ($theme['font_size'])+1; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.extra {
                    background: <?php echo $theme['info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo ($theme['font_size']+3); ?>px;
                    color: <?php echo $theme['extra_text']; ?>;
                }

                td.printinfo {
                    background: <?php echo $theme['print_info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_info_text']; ?>;
                }

                a.info:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }



            <?php if(eregi("IE", $HTTP_USER_AGENT)){ ?>
                select, option, textarea, input {
                    border: 1px solid <?php echo $theme['table_border']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: bold;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            else{ ?>
                select, option, textarea, input {
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            ?>

                a.info:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                td.subcat {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo '$theme["font_size"] + 4'?>'px';
                    font-weight: 600
                }

            <?php       if(eregi("IE", $HTTP_USER_AGENT)){ ?>
                select, option, textarea, input {
                    border: 1px solid <?php echo $theme['table_border']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: bold;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
                   }
                   else{ ?>
                select, option, textarea, input {
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            ?>


                td.cat {
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.stats {
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: 10px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.error {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: #ff0000;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                td.subcat {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo '$theme["font_size"] + 4'?>'px';
                    font-weight: 600;
                }

                input.box {
                    border: 4px;
                    height: 16px
                }

                table.border2 {
                    background: #6974b5;
                }

                td.install {
                    background: #dddddd;
                    color: #000000;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                }

                table.install {
                    background: #000099;
                }

                td.head {
                    text-align: left;
                    background: #6974b5;
                    color: #ffffff;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                }

                a.install:link {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #6974b5;
                }

                a.install:visited {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #6974b5;
                }

                a.install:active {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #000099;
                }

                a.install:hover {
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #000099;
                }




            }

            /*Wide Layout*/
            @media screen and (min-width: 768px) {
                .wrap {
                    width: 1140px;
                    margin: 0 auto;
                    zoom: 0.9;
                }

                .back {
                    background-color: #ffffff;
                }

                table {
                    -webkit-border-horizontal-spacing: 2px;
                    -webkit-border-vertical-spacing: 1px;
                    font-weight: 500;

                }

                #selectwidth {
                /*    background-color: #afe7f7;   */
                    border: 0 solid;
                    background-color: <?php echo $theme['subcategory']; ?>;
                    -webkit-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 350px;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;

                    /* background: transparent;
                     padding: 5px 10px 5px 5px;
                     font-size: 16px;
                     border: 1px solid #f4a62b;
                     height: 34px;
                     -webkit-appearance: none;
                     -moz-appearance: none;
                     appearance: none;
                     background: url(http://www.stackoverflow.com/favicon.ico) 96% / 15% no-repeat */
                }

                #selectwidth2 {
                    background-color: <?php echo $theme['category']; ?>;
                    border: 0 solid;
                    -webkit-box-shadow: #B4B5B5 3px 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 350px;
                    font-weight: 600;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;

                }

                #selectwidth option, #selectwidth2 option {

                    width: 350px;
                    font-weight: 600;
                    color: darkslateblue;
                    padding: 5px;
                    font-size: 13px;
                }

                /*


                  #submit {
                      width: 21px;
                      height: 21px;
                      border:  10px;
                      margin: 10px;
                      padding: 6px;
                      background: #feaa37 url(../images/casariadefault/log_button.jpg) 10 10 no-repeat;
                      font-weight:600;
                      color: darkslateblue;
                      list-style-type: circle;
                      font-size: 13px;
                      -moz-border-radius: 3px;
                      -webkit-border-radius: 3px;


                  }*/
                input[type=text], textarea, select, input[type=submit] {
                    border: 2px solid #ffad41;
                    -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                    -moz-box-shadow: #B4B5B5 3px 3px 3px;
                    box-shadow: #B4B5B5 3px 3px 3px;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    border-radius: 3px;
                    font-size: 13px;
                    padding: 2px 2px 2px 2px;
                    text-decoration: none;

                    display: inline-block;
                    text-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
                    font-weight: bold;
                    color: #FFFFFF;
                    background-color: #ffc579;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#ffc579), to(#fb9d23));
                    background-image: -webkit-linear-gradient(top, #ffc579, #fb9d23);
                    background-image: -moz-linear-gradient(top, #ffc579, #fb9d23);
                    background-image: -ms-linear-gradient(top, #ffc579, #fb9d23);
                    background-image: -o-linear-gradient(top, #ffc579, #fb9d23);
                    background-image: linear-gradient(to bottom, #ffc579, #fb9d23);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffc579, endColorstr=#fb9d23);
                }

                input[type=text]:hover, textarea:hover, select:hover {
                    border: 2px dashed #ff9913;
                    background-color: <?php echo $theme['bg2']; ?>;
                    /*
                    background-color: #AFE7F7; background-image: -webkit-gradient(linear, left top, left bottom, from(#AFE7F7), to(#90CDDD));
                    background-image: -webkit-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -moz-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -ms-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: -o-linear-gradient(top, #AFE7F7, #90CDDD);
                    background-image: linear-gradient(to bottom, #AFE7F7, #90CDDD)
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffc579, endColorstr=#fb9d23);

                    */
                }

                button, input[type=submit] {
                    border-top-color: #67bcd1;
                    border-right-color: #67bcd1;
                    border-bottom-color: #67bcd1;
                    border-left-color: #67bcd1;
                    border-width: 3px;
                    border-style: solid;
                    -webkit-box-shadow: #797991 1px 1px 1px;
                    -moz-box-shadow: #797991 1px 1px 1px;
                    box-shadow: #797991 1px 1px 1px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                    font-size: 18px;
                    font-family: tahoma, verdana, arial, sans-serif;
                    padding: 12px 12px 12px 12px;
                    text-decoration: none;
                    display: inline-block;
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
                    color: #FFFFFF;
                    background-color: #92cfde;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#92cfde), to(#76bdd1));
                    background-image: -webkit-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -moz-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -ms-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -o-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: linear-gradient(to bottom, #92cfde, #76bdd1);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#92cfde, endColorstr=#76bdd1);
                }

                button:hover, input[type=submit]:hover {
                    border-top-color: #44adc6;
                    border-right-color: #44adc6;
                    border-bottom-color: #44adc6;
                    border-left-color: #44adc6;
                    border-width: 4px;
                    border-style: solid;
                    background-color: #6bbed2;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#6bbed2), to(#50abc4));
                    background-image: -webkit-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -moz-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -ms-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: -o-linear-gradient(top, #6bbed2, #50abc4);
                    background-image: linear-gradient(to bottom, #6bbed2, #50abc4);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#6bbed2, endColorstr=#50abc4);
                }

                BODY {
                    background: <?php echo $theme['bgcolor'];?>;
                    color: black;
                    font-weight: 600;
                }

                a:link {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                    font-weight: 600;
                }

                a:visited {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                }

                a:active {
                    text-decoration: none;
                    color: <?php echo $theme['link']; ?>;
                }

                a:hover {
                    text-decoration: underline;
                    color: <?php echo $theme['link']; ?>;
                }

                a.kbase:link {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:visited {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:active {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                a.kbase:hover {
                    text-decoration: underline;
                    font-weight: bold;
                    color: <?php echo $theme['text']; ?>;
                }

                /*table.border {
                    background: <?php echo $theme['table_border']; ?>;
                    color: black;
                } */

                td {
                    color: #000000;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                tr {
                    color: #000000;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                td.back {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                td.back2 {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                td.printback {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['print_bg']; ?>;
                }

                td.date {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size'];?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.hf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.printhf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['print_header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_header_text']; ?>;
                }

                a.hf:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                .alternate tr:nth-child(2n+0) {
                    background-color: <?php echo $theme['bg1']; ?>;
                }

                .alternate tr:nth-child(2n+0):hover, .alternate tr:hover {
                    background-color: #E7FF00;
                }

                .alternate tr:nth-child(2n+2) {
                    background-color: <?php echo $theme['bg2']; ?>;
                }

                .alternate tr:nth-of-type(1) {
                    background-color: <?php echo $theme['bg1']; ?>;
                    padding: 20px;
                    font-size: 22px
                }

                tr.back {
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                tr.back2 {
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                tr.back3 {
                    line-height: <?php echo $lineHeight; ?>;
                    background: #feaa37;
                    font-weight: 600;
                }
                /*table tr:nth-child(odd) tr{background:

                 }
                table tr:nth-child(even) tr{background:


                }
                */
                td.back {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg1']; ?>;
                }

                td.back2 {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['bg2']; ?>;
                }

                td.printback {
                    padding: <?php echo $tablePadding; ?>px;
                    line-height: <?php echo $lineHeight; ?>;
                    background: <?php echo $theme['print_bg']; ?>;
                }

                td.date {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size'];?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.hfo {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.hf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: #c9caea;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-weight: 600;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.printhf {
                    padding: <?php echo $tablePadding; ?>px;
                    background: <?php echo $theme['print_header_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_header_text']; ?>;
                }

                a.hf:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-weight: 600;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: #9907c1;
                }

                /* 00c6ff , a34bc6*/
                a.hf:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.hf:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                a.info:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.hf:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }


                td.info {
                    text-align: left;
                    background: <?php echo $theme['info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo ($theme['font_size'])+1; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                }

                td.extra {
                    background: <?php echo $theme['info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo ($theme['font_size']+3); ?>px;
                    color: <?php echo $theme['extra_text']; ?>;
                }

                td.printinfo {
                    background: <?php echo $theme['print_info_bg']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", Helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['print_info_text']; ?>;
                }

                a.info:link {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }



            <?php if(eregi("IE", $HTTP_USER_AGENT)){ ?>
                select, option, textarea, input {
                    border: 1px solid <?php echo $theme['table_border']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: bold;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            else{ ?>
                select, option, textarea, input {
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']; ?>px;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            ?>

                a.info:visited {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:active {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: none;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                a.info:hover {
                    line-height: <?php echo $lineHeight; ?>;
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['info_text']; ?>;
                }

                td.subcat {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo '$theme["font_size"] + 4'?>'px';
                    font-weight: 600
                }

            <?php       if(eregi("IE", $HTTP_USER_AGENT)){ ?>
                select, option, textarea, input {
                    border: 1px solid <?php echo $theme['table_border']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: bold;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
                   }
                   else{ ?>
                select, option, textarea, input {
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 11px;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
            }
            ?>


                td.cat {
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.stats {
                    background: <?php echo $theme['category']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: 10px;
                    color: <?php echo $theme['text']; ?>;
                }

                td.error {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: #ff0000;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo $theme['font_size']; ?>px;
                }

                td.subcat {
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                    font-family: "<?php echo $theme['font']; ?>";
                    font-size: <?php echo '$theme["font_size"] + 4'?>'px';
                    font-weight: 600;
                }

                input.box {
                    border: 4px;
                    height: 16px
                }

                table.border2 {
                    background: #6974b5;
                }

                td.install {
                    background: #dddddd;
                    color: #000000;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                }

                table.install {
                    background: #000099;
                }

                td.head {
                    text-align: left;
                    background: #6974b5;
                    color: #ffffff;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                }

                a.install:link {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #6974b5;
                }

                a.install:visited {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #6974b5;
                }

                a.install:active {
                    text-decoration: none;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #000099;
                }

                a.install:hover {
                    text-decoration: underline;
                    font-weight: normal;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #000099;
                }

            }


        </STYLE>
    </HEAD>
<?php

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
 ************************************************************************************************************/
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

?>