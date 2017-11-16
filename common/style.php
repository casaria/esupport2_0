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

//

//if the user is not logged in, set the default style sheet.
//otherwise, grab the selected theme from the database.
$theme = getThemeVars(getThemeName($cookie_name));

$tablePadding =2;


?>

        <meta charset="utf-8">

    <!-- Bootstrap -->
    <!--<link href="../css/bootstrap.min.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --><!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--  <script src="../js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" >


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <!-- THeSE ARE WORKING (ll 4 sources   -->

    <!--  <script src="../dylay/assets/vendor/jquery.easing.1.3.js"></script> -->
    <script src="../dylay/src/dylay.js"></script>
    <script src="../dylay/assets/js/main.js"></script>

    <script src="/common/quagga.js" type="text/javascript"></script>




    <link rel="stylesheet" href="/dylay/assets/css/main.css" media="screen">

    <link href='https://fonts.googleapis.com/css?family=Titillium Web:300:400:500:600:700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/dylay/assets/css/main.css" media="screen">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script type="text/javascript">
        WebFontConfig = {
            google: {families: ['Roboto::latin', 'Lato::latin', 'Roboto+Condensed::latin', 'Ropa+Sans:latin', 'Titillium Web:400,500,600,700:latin']}
        };

        (function () {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();


        var devicewidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        var container = document.querySelector('container');
            container.style.setProperty('--devicewidth', devicewidth);

/*let viewportmeta = document.querySelector('meta[name="viewport"]');
if(viewportmeta===null){
  viewportmeta = document.createElement("meta");
  viewportmeta.setAttribute("name","viewport");
  document.head.appendChild(viewportmeta);

  viewportmeta = document.querySelector('meta[name="viewport"]');
}
viewportmeta.setAttribute('content', "initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0");
console.log(document.querySelector('meta[name="viewport"]'));
        $(function () {
            if (!(/iPad|iPhone|iPod/.test(navigator.userAgent))) return;
            $(document.head).append(
                '<style>*{cursor:pointer;-webkit-tap-highlight-color:rgba(0,0,0,0)}</style>'
            );
            $(window).on('gesturestart touchmove', function (evt) {
                if (evt.originalEvent.scale !== 1) {
                    evt.originalEvent.preventDefault();
                    document.body.style.transform = 'scale(1,1)'
                }
            })
        }) */
/*
        function isvisible(obj) {
            return obj.offsetWidth > 0 && obj.offsetHeight > 0;
        }  */


        let viewportmeta = document.querySelector('meta[name="viewport"]');
        if(viewportmeta===null){
            viewportmeta = document.createElement("meta");
            viewportmeta.setAttribute("name","viewport");
            document.head.appendChild(viewportmeta);

            viewportmeta = document.querySelector('meta[name="viewport"]');
        }
        viewportmeta.setAttribute('content', "initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0");
        console.log(document.querySelector('meta[name="viewport"]'));


      /*  rtAt = 0;
        let lastTouchStartAt = 0;
        const delay = 200;

        document.addEventListener('touchstart', () => {
            preLastTouchStartAt = lastTouchStartAt;
        lastTouchStartAt = +new Date();
        });
        document.addEventListener('touchend', (event) => {
            const touchEndAt = +new Date();
        if (touchEndAt - preLastTouchStartAt < delay) {
            event.preventDefault();
            event.target.click();




            //document.body.style.transform = 'scale(1)'
        }
        })    */


    </script>

             <style>
                #interactive.viewport {position: relative; width: 100%; height: auto; overflow: hidden; text-align: center;}
                #interactive.viewport > canvas, #interactive.viewport > video {max-width: 100%;width: 100%;}
                canvas.drawing, canvas.drawingBuffer {position: absolute; left: 0; top: 0;}
            </style>
            <script type="text/javascript">
                $(function() {
                    // Create the QuaggaJS config object for the live stream
                    var liveStreamConfig = {
                        inputStream: {
                            type : "LiveStream",
                            constraints: {
                                width: {min: 640},
                                height: {min: 480},
                                aspectRatio: {min: 1, max: 100},
                                facingMode: "environment" // or "user" for the front camera
                            }
                        },
                        locator: {
                            patchSize: "medium",
                            halfSample: false
                        },
                        numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
                        decoder: {
                            "readers":[
                                {"format":"ean_8_reader","config":{}},
                                {"format":"upc_reader","config":{}},
                                //   {"format":"i2of5_reader","config":{}},
                                //   {"format":"2of5_reader","config":{}}
                            ]
                        },
                        locate: true
                    };
                    // The fallback to the file API requires a different inputStream option.
                    // The rest is the same
                    var fileConfig = $.extend(
                        {},
                        liveStreamConfig,
                        {
                            inputStream: {
                                size: 800
                            }
                        }
                    );
                    // Start the live stream scanner when the modal opens
                    $('#livestream_scanner').on('shown.bs.modal', function (e) {
                        Quagga.init(
                            liveStreamConfig,
                            function(err) {
                                if (err) {
                                    $('#livestream_scanner .modal-body .error').html('<div class="alert alert-danger"><strong><i class="fa fa-exclamation-triangle"></i> '+err.name+'</strong>: '+err.message+'</div>');
                                    Quagga.stop();
                                    return;
                                }
                                Quagga.start();
                            }
                        );
                    });

                    // Make sure, QuaggaJS draws frames an lines around possible
                    // barcodes on the live stream
                    Quagga.onProcessed(function(result) {
                        var drawingCtx = Quagga.canvas.ctx.overlay,
                            drawingCanvas = Quagga.canvas.dom.overlay;

                        if (result) {
                            if (result.boxes) {
                                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                                result.boxes.filter(function (box) {
                                    return box !== result.box;
                                }).forEach(function (box) {
                                    Quagga.ImageDebug.drawPath(box, {x: 0, y: 1}, drawingCtx, {color: "green", lineWidth: 2});
                                });
                            }

                            if (result.box) {
                                Quagga.ImageDebug.drawPath(result.box, {x: 0, y: 1}, drawingCtx, {color: "#00F", lineWidth: 2});
                            }

                            if (result.codeResult && result.codeResult.code) {
                                Quagga.ImageDebug.drawPath(result.line, {x: 'x', y: 'y'}, drawingCtx, {color: 'red', lineWidth: 3});
                            }
                        }
                    });

                    // Once a barcode had been read successfully, stop quagga and
                    // close the modal after a second to let the user notice where
                    // the barcode had actually been found.
                    Quagga.onDetected(function(result) {
                        if (result.codeResult.code){
                            $('#scanner_input').val(result.codeResult.code);
                            Quagga.stop();
                            setTimeout(function(){ $('#livestream_scanner').modal('hide'); }, 1000);
                        }
                    });

                    // Stop quagga in any case, when the modal is closed
                    $('#livestream_scanner').on('hide.bs.modal', function(){
                        if (Quagga){
                            Quagga.stop();
                        }
                    });

                    // Call Quagga.decodeSingle() for every file selected in the
                    // file input
                    $("#livestream_scanner input:file").on("change", function(e) {
                        if (e.target.files && e.target.files.length) {
                            Quagga.decodeSingle($.extend({}, fileConfig, {src: URL.createObjectURL(e.target.files[0])}), function(result) {alert(result.codeResult.code);});
                        }
                    });
                });
            </script>



    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <HTML>
    <HEAD>


        <TITLE> <?php echo $TITLE; ?></TITLE>
        <?php
        if ($theme['font'] == "Titillium Web") {
            $lineHeight = 1.2;
            $tablePadding = 5;
        } else {
            $lineHeight = 1.1;
            $tablePadding = 3;

        } ?>


        <STYLE type="text/css"/>
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

?>