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



        <link rel="stylesheet" href="/common/bootstrap.css" media="screen">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



    <script src="../dylay/assets/vendor/jquery.easing.1.3.js"></script>
    <script src="../dylay/src/dylay.js"></script>
    <script src="../dylay/assets/js/main.js"></script>
    <script src="/common/quagga.js" type="text/javascript"></script>

    <meta name="viewport-d" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Titillium Web:300:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/dylay/assets/css/main.css" media="screen">


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


        rtAt = 0;
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
        })


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
                    halfSample: true
                },
                numOfWorkers: (navigator.hardwareConcurrency ? navigator.hardwareConcurrency : 4),
                decoder: {
                    "readers":[
                        {"format":"ean_8_reader","config":{}},
                        {"format":"upc_e_reader","config":{}},
                        {"format":"i2of5_reader","config":{}},
                        {"format":"2of5_reader","config":{}}
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

            * {margin:0; padding:0;}

            table {
                border-spacing: 1px;
                border-collapse: collapse;
                margin: 1px;
            }

            td.cat {
                background: <?php echo $theme['category']; ?>;
                font-family: "<?php echo $theme['font']; ?>";
                font-size: <?php echo $theme['font_size']; ?>px;
                color: <?php echo $theme['text']; ?>;
                padding-left: 15px;
                padding-bottom: 4px;
                padding-top: 4px;
                padding-right: 6px;

            }

            .text-1, .text-2, .text-3,
            text-login {
                border: 2px solid #ffad41;
                -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                -moz-box-shadow: #B4B5B5 3px 3px 3px;
                box-shadow: #B4B5B5 3px 3px 3px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                font-size: 18px;
                padding: 2px 2px 2px 2px;
                margin: 5px;
                text-decoration: none;
                color: darkslateblue;
                display: inline-block;
                text-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
                font-weight: 600;
                background-color: #ffc579;
                background-image: -webkit-gradient(linear, left top, left bottom, from(#ffc579), to(#fb9d23));
                background-image: -webkit-linear-gradient(top, #ffc579, #fb9d23);
                background-image: -moz-linear-gradient(top, #ffc579, #fb9d23);
                background-image: -ms-linear-gradient(top, #ffc579, #fb9d23);
                background-image: -o-linear-gradient(top, #ffc579, #fb9d23);
                background-image: linear-gradient(to bottom, #ffc579, #fb9d23);
                filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#ffc579, endColorstr=#fb9d23);
            }

            .text-1 {
                width: 80px;
            }
            .text-2 {
                width: 150px;
            }
            .text-3 {
                width: 300px;
            }
            .text-login
            {
                margin: 6px;
                width: 150px;
            }
            .text-tag{
                margin: 6px;
                width: 180px;
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
                padding-left: 15px;
                padding-bottom: 4px;
                padding-top: 4px;
                padding-right: 6px;

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


            .container-login
            {   width: 420px;
                border-radius:5px;
                border: #f4a62b;
                border-width: 3px;
                background-color: <?php echo $theme['bg2']; ?>;
                margin: -5px;
                -webkit-box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);
                -moz-box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);
                box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);
                Copy Text

                }

            /*### Smartphones (portrait and landscape)(small)### */
            @media screen and (min-width : 0px) and (max-width : 767px){
                /*Base Mobile Layout*/
                .wrap {
                    /*width: 50%;  */
                    margin: 0 auto;
                    zoom: 0.25;
                }


                table {
                    -webkit-border-horizontal-spacing: 2px;
                    -webkit-border-vertical-spacing: 1px;
                    font-weight: 500;
                    padding: 5px;
                    margin: 2px;
                }

                .container {
                    background-color: whitesmoke;
                    padding-right: 4px;
                    padding-left: 4px;
                    margin-right: 0px;
              /*      margin-left: 6px; */
              /*      width: 580px;   */
              /*    position: fixed;  */
                    width: 421px;
                    height: 756px;
                    left: 0%;
                    top: 0%;
                    margin-left: 0px; /*half the width*/
                }
                #selectwidth {
                    background-color: #afe7f7;
                    border: 0 solid;
                    Vbackground-color: <?php echo $theme['subcategory']; ?> border: 2px solid;
                    -webkit-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
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

                    background-color: <?php $theme['category']; ?>;
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

                input[type=text], textarea, select,
                input[type=password]
                {
                    border: 2px solid #67bcd1;
                    -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                    -moz-box-shadow: #B4B5B5 3px 3px 3px;
                    box-shadow: #B4B5B5 3px 3px 3px;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    border-radius: 3px;
                    font-size: 15px;
                    padding: 4px 2px 2px 4px;
                    text-decoration: none;

                    display: inline-block;
                    text-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
                    font-weight: 600;
                    color: #313131;
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



                input[type=text]:hover, input[type=password]:hover,
                textarea:hover, select:hover {
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



                button, input[type=submit] {
                    border: 2px solid #6974b5;
                    -webkit-box-shadow: #797991 3px 3px 3px;
                    -moz-box-shadow: #797991 3px 3px 3px;
                    box-shadow: #797991 3px 3px 3px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                    font-size: 16px;
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
                    border: 2px solid #44adc6;
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
                    margin-left: 2px;

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
                    padding: 1px;
                    margin: 1px;
                }


                .container {
                    padding-right: 5px;
                    padding-left: 5px;
                    margin-right: 2px;
                    margin-left: 2px;
                    width: 780px;
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
                    font-size: <?php echo ($theme['font_size']); ?>px
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;

                    /* background: transparent;
                     padding: 5px 10px 5px 5px;

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
                    border: -2px solid #ffad41;
                    -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                    -moz-box-shadow: #B4B5B5 3px 3px 3px;
                    box-shadow: #B4B5B5 3px 3px 3px;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    border-radius: 3px;
                    font-size: 16px;
                    padding-top: 2px;
                    padding-right: 2px;
                    padding-left: 2px;
                    padding-bottom: 2px;
                    margin: 5px;
                    text-decoration: none;

                    display: inline-block;
                    text-shadow: 0 0 0 rgba(0, 0, 0, 0.3);
                    font-weight: 600;
                    color: <?php echo $theme['text']; ?>;
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
                    color: <?php echo $theme['text']; ?>;
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

                    border: 2px solid #67bcd1;
                    -webkit-box-shadow: #797991 3px 3px 3px;
                    -moz-box-shadow: #797991 3px 3px 3px;
                    box-shadow: #797991 3px 3px 3px;
                    -webkit-border-radius: 4px;
                    -moz-border-radius: 4px;
                    border-radius: 4px;
                    font-size: 16px;
                    padding: 6px 6px 6px 6px;
                    text-decoration: none;
                    display: inline-block;
                    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.3);
                    color:<?php echo $theme['text'];?>;
                    background-color: #f3f3f3;
                    background-image: -webkit-gradient(linear, left top, left bottom, from(#92cfde), to(#76bdd1));
                    background-image: -webkit-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -moz-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -ms-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: -o-linear-gradient(top, #92cfde, #76bdd1);
                    background-image: linear-gradient(to bottom, #92cfde, #76bdd1);
                    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=#92cfde, endColorstr=#76bdd1);
                }

                button:hover, input[type=submit]:hover {
                    border: 2px solid #44adc6;
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

                table.border {
                    background: transparent;
                    margin-left: 0PX;
                    margin-right:6PX;
                    margin-top: 0;
                    color: black;
                    padding-left: 2px;
                    padding-bottom: 2px;
                    padding-right: 2px;
                    padding-top: 2px;


                }

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
                    font-size: <?php echo ($theme['font_size'])+2; ?>px;
                    color: <?php echo $theme['header_text']; ?>;
                    padding: 3px;
                    padding-left: 8px;
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


            <?php       if(eregi("IE", $HTTP_USER_AGENT)){ ?>
                select, option, textarea, input {
                    border: 1px solid <?php echo $theme['table_border']; ?>;
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: <?php echo $theme['font_size']+2; ?>px;
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
        }

            .btn-login, pwd-login {
                width: 150px;
                height: 40px;
                padding-bottom: 10px;
                margin-bottom: 35px;
                margin-top: 20px;
                margin-left: 6px;
            }

            .btn-scan {
                width: 120px;
                height: 35px;
                padding-bottom: 10px;
                margin-bottom: 35px;
                margin-top: 5px;
                margin-left: 15px;
            }
            .h3{
                font-weight: 700;
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