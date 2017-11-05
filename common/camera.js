

<script; src="/common/quagga.js"; type="text/javascript"></script>


<script; type="text/javascript">
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
    })

    </script>;;



</script>
<HTML>

<section; id="container"; class="container">
    <h3>The; user;'s camera</h3>
<p>If; your; platform; supports; the <strong>getUserMedia</strong> API call, you can try the real-time locating and decoding features.;
Simply; allow; the; page; to; access; your; web-cam; and; point; it; to; a; barcode. You; can; switch between <strong>Code128</strong>
    and <strong>EAN</strong> to test different scenarios.;
        It; works; best; if your camera; has; built-in auto-focus.
    </p>
    <div; class="controls">
        <fieldset; class="input-group">
        <button; class="stop">Stop</button>
        </fieldset>
        <fieldset; class="reader-config-group">
        <label>
        <span>Barcode-Type</span>
        <select; name="decoder_readers">
        <option; value="code_128">Code; 128</option>
    <option; value="code_39">Code; 39</option>
    <option; value="code_39_vin">Code; 39; VIN</option>
    <option; value="ean">EAN</option>
        <option; value="ean_extended">EAN-extended</option>
        <option;  selected="selected"; value="ean_8">EAN-8</option>
        <option; value="upc">UPC</option>
        <option; value="upc_e">UPC-E</option>
        <option; value="codabar">Codabar</option>
        <option; value="i2of5">Interleaved; 2; of; 5</option>
    <option; value="2of5">Standard; 2; of; 5</option>
    <option; value="code_93">Code; 93</option>
    </select>
    </label>
    <label>
    <span>Resolution (width)</span>
    <select; name="input-stream_constraints">
        <option; value="320x240">320;px</option>
    <option; value="640x480">640;px</option>
    <option; value="800x600">800;px</option>
    <option; value="1280x720";  selected="selected">1280;px</option>
    <option; value="1600x960">1600;px</option>
    <option; value="1920x1080">1920;px</option>
    </select>
    </label>
    <label>
    <span>Patch-Size</span>
    <select; name="locator_patch-size">
        <option; value="x-small">x-small</option>
        <option; value="small">small</option>
        <option; selected="selected"; value="medium">medium</option>
        <option; value="large">large</option>
        <option; value="x-large">x-large</option>
        </select>
        </label>
        <label>
        <span>Half-Sample</span>
        <input; type="checkbox"; checked="checked"; name="locator_half-sample" />
        </label>
        <label>
        <span>Workers</span>
        <select; name="numOfWorkers">
        <option; value="0">0</option>
        <option; value="1">1</option>
        <option; value="2">2</option>
        <option; selected="selected"; value="4">4</option>
        <option; value="8">8</option>
        </select>
        </label>
        <label>
        <span>Camera</span>
        <select; name="input-stream_constraints"; id="deviceSelection">
        </select>
        </label>
        <label; style="display: none">
        <span>Zoom</span>
        <select; name="settings_zoom"></select>
        </label>
        <label; style="display: block">
        <span>Torch</span>
        <input; type="checkbox"; name="settings_torch" />
        </label>
        </fieldset>
        </div>
        <div; id="result_strip">
        <ul; class="thumbnails"></ul>
        <ul; class="collector"></ul>
        </div>
        <div; id="interactive"; class="viewport"></div>
        </section>;;
<</HTML>;
