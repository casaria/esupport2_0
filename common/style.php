<?php

/***************************************************************************************************
 **
 **    file: style.php
 **
 **        This file contains the style sheet.
 **
 **
 ***************************************************************************************/

//if the user is not logged in, set the default style sheet.
//otherwise, grab the selected theme from the database.
require_once  $_SERVER['DOCUMENT_ROOT']."/common/themelib.php";
$theme = getThemeVars(getThemeName($cookie_name));

$tablePadding =2;


?>

        <meta charset="utf-8">

    <!-- Bootstrap -->
    <!--<link href="../css/bootstrap.min.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn'` work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --><!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--  <script src="../js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->

    <style>
        * {margin: 0; padding: 0;}
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css" >


    <script src="/mdb/js/jquery-3.2.1.min.js"></script>
    <script src="/mdb/js/3.2.1.popper.min.js"></script>
    <script src="/mdb/js/bootstrap-4b2.min.js"></script>

    <!-- THeSE ARE WORKING (ll 4 sources   -->

    <!--  <script src="../dylay/assets/vendor/jquery.easing.1.3.js"></script> -->
    <script src="/dylay/src/dylay.js"></script>
    <script src="/dylay/assets/js/main.js"></script>

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

/* ########################## OBSOLETE DUE TO BOOTSTRAP #####################

        let viewportmeta = document.querySelector('meta[name="viewport"]');
        if(viewportmeta===null){
            viewportmeta = document.createElement("meta");
            viewportmeta.setAttribute("name","viewport");
            document.head.appendChild(viewportmeta);

            viewportmeta = document.querySelector('meta[name="viewport"]');
        }


        viewportmeta.setAttribute('content', "initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0");
        console.log(document.querySelector('meta[name="viewport"]'));

  ####################################################################### */

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




        <STYLE type="text/css">

            * {margin:0; padding:0;}

            table {
                border-spacing: 0px;
                border-collapse: collapse;
                margin: 0px;
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



            .stats {
                background: <?php echo $theme['bg1']; ?>;
                font-family: "<?php echo $theme['font']; ?>";
                font-size: 10px;
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

            }
            .container-asset
            {   width: 300px;
                height: 80%;
                border-radius:5px;
                border: #f4a62b;
                border-width: 3px;
                background-color: <?php echo $theme['bg2']; ?>;
                margin: -5px;
                -webkit-box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);
                -moz-box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);
                box-shadow: 13px 11px 7px -4px rgba(117,115,117,1);

            }

            /*### Smartphones (portrait and landscape)(small)### */
            @media screen and (min-width : 0px) and (max-width : 767px) {
                /*Base Mobile Layout*/
                .wrap {
                    /*width: 50%;  */
                    margin: 0 auto;
                    zoom: 0.25;
                }

                .cas-table {
                    -webkit-border-horizontal-spacing: 2px;
                    -webkit-border-vertical-spacing: 1px;
                    font-weight: 500 !important;
                    padding: 5px;
                    margin: 2px;
                }

                .container {
                    background-color: whitesmoke;
                    margin-right: 2px;
                    padding: 2px;
                    /*      margin-left: 6px; */
                    /*      width: 580px;   */
                 /*   position: fixed;  */
               /*    position: absolkl; */
                   /* width: 321px;  */
                /*    position: relative ; */
               /*     width: 421px;
                    overflow-y: scroll;
                    max-height:680px;  */
                    margin-top: 0px; /*  width  421  */
                    width: 375px;
                    height: 1800px;
                    left: 0px;
                    top: 0px;
                    margin-left: 4px; /*half the width*/
                }

                .selectwidth {
                    background-color: #afe7f7;
                    Vbackground-color: <?php echo $theme['subcategory']; ?>
                    border: 2px solid;
                    -webkit-box-shadow: #333333 3PX 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 200px;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;
                    font-size: 14px;

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

                .selectwidth2 {

                    background-color: <?php $theme['category']; ?>;
                    border: 0 solid;
                    -webkit-box-shadow: #333333 3px 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 200px;
                    font-weight: 600;
                    outline: 0;
                    overflow: hidden;
                    padding: 2px 2px 2px 2px;
                    font-size: 14px;

                }

                .selectwidth option, .selectwidth2 option {

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
                input[type=password] {
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

                button, input[type=submit],
                input[type=reset] {
                    border: 2px solid #6974b5;
                    margin: 5px;
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

                button:hover, input[type=submit]:hover,
                input[type=reset]:hover {
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
                    background:
            <?php echo $theme['table_border']; ?>;
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
                    color: <?php echo $theme['text']; ?>;x
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
                    padding-left: 6px;
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

                .tkt-textarea {
                    width: 200px;
                    height: 60px;
                    font-size: <?php echo ($theme['font_size']+1); ?>px;
                }

                .task-textarea {
                    width: 250px;
                    height: 80px;
                }

                .tkt-date{
                    margin: 4px;
                    height: 34px;
                    font-size: <?php echo ($theme['font_size']+1); ?>px;
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
                    font-size: 12px;
                    font-weight: bold;
                    background: <?php echo $theme['subcategory']; ?>;
                    color: <?php echo $theme['text']; ?>;
                }

            <?php
                   }
                   else{ ?>
                select, option, textarea, input {
                    font-family: "<?php echo $theme['font']; ?>", arial, helvetica, sans-serif;
                    font-size: 12px;
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
                    -webkit-border-horizontal-spacing: 0;
                    -webkit-border-vertical-spacing: 0;
                    font-weight: 500;
                    padding: 0px;
                    margin: 0px;
                }


                .container {
                    padding-right: 5px;
                    padding-left: 5px;
                    margin-right: 2px;
                    margin-left: 2px;
                    width: 680px;
                }
                .selectwidth {
                /*    background-color: #afe7f7;   */
                    border: 0 solid;
                    background-color: <?php echo $theme['subcategory']; ?>;
                    -webkit-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -moz-box-shadow: #B4B5B5 3PX 3PX 3PX;
                    box-shadow: #B4B5B5 3PX 3PX 3PX;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    width: 350px;
                    font-size: <?php echo $theme['font_size']; ?>px
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

                .alternate  {
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
                    font-size: <?php echo $theme['font_size']; ?>px

                }

                .selectwidth option, .selectwidth2 option {

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
                input[type=text], textarea, select, input[type=submit],
                input[type=reset] {
                    border: 3px solid #ffad41;
                    -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                    -moz-box-shadow: #B4B5B5 3px 3px 3px;
                    box-shadow: #B4B5B5 3px 3px 3px;
                    -webkit-border-radius: 3px;
                    -moz-border-radius: 3px;
                    border-radius: 3px;
                    font-size:  <?php echo ($theme['font_size']+1); ?>px;
                    padding: 2px;
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
                    border: 2px dashed rebeccapurple;
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



                button, input[type=submit],
                input[type=reset]
                {

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

                button:hover, input[type=submit]:hover,
                input[type=reset]:hover
                {
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

                .answer td.back {
                    color: inherit;
                    font-weight: 500;
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
                    font-weight: 600 !important;
                    padding-top: 3px;
                    padding-right 3px;
                    padding-bottom: 3px;
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

                .tkt-textarea {
                    width: 350px;
                    height: 80px;
                    font-size: <?php echo ($theme['font_size']+1); ?>px;
                }

                .task-textarea {
                    width:360px;
                    height: 80px;
                }

                .tkt-date{
                    margin: 4px;
                    font-size: <?php echo ($theme['font_size']+1); ?>px;
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

            .text-1, .text-2, .text-3,
            text-login {
                border: 2px solid #ffad41;
                -webkit-box-shadow: #B4B5B5 3px 3px 3px;
                -moz-box-shadow: #B4B5B5 3px 3px 3px;
                box-shadow: #B4B5B5 3px 3px 3px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
                font-size: 16px;
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
                width: 80px !important;
                padding: 2px 2px 2px 2px;
                border-radius: 3px;
                font-size: 16px;
            }

            .text-2,
            .text-login {
                width: 180px;
                padding: 2px 4px 4px 2px;
                border-radius: 4px;
                font-size: 18px;
                margin: 5px;
            }

            .text-3 {
                font-size: 16px;
                width: 300px;
                padding: 2px 2px 2px 2px;
                border-radius: 3px;
            }
            .text-login
            {
                margin: 6px;
                width: 150px;
                padding: 4px 4px 4px 4px;
            }
            .text-tag {
                margin: 5px;
                margin-top: 10px;
                width: 180px;
                height: 35px;
                font-weight: 800;
                font-size: 26px;
                padding-top: 2px;
                padding-right: 6px;
                padding-left: 6px;
                padding-bottom: 2px;
            }

            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
                color: grey;
            }
            ::-moz-placeholder { /* Firefox 19+ */
                color: grey;
            }
            :-ms-input-placeholder { /* IE 10+ */
                color: grey;
            }
            :-moz-placeholder { /* Firefox 18- */
                color: grey;
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
                width: 90px;
                height: 35px;
                padding: 3px;
                margin-bottom: 10px;
                margin-top: 10px;
                margin-left: 15px;
            }



        </STYLE>
    </HEAD>
<?php


?>
