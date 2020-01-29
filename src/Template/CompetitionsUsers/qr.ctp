<html><head>
  <meta charset="utf-8">
  <title>WBS Coliseum QR Subs</title>
  <link href="/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
  <script src="/js/jsQR/jsQR.js"></script>
  <script src="/js/tingle/tingle.js"></script>
  <script src="/js/sweetAlert/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="/css/tingle/tingle.css" media="all">
  <link rel="stylesheet" href="/css/cameratest/font-awesome.min.css">
  <style>
    body {
      font-family: 'Ropa Sans', sans-serif;
      color: #fff;
      #max-width: 640px;
      #margin: 0 auto;
      #position: relative;
      background-color:black;
    }

    #githubLink {
      position: absolute;
      right: 0;
      top: 12px;
      color: #2D99FF;
    }

    #loadingMessage {
      text-align: center;
      padding: 40px;
      background-color: #eee;
      color:#000;
    }

    #canvas {
      width: 100%;
    }

    #output {
      margin-top: 20px;
      background: #2f2f2f;
      padding: 10px;
      padding-bottom: 0;
    }

    #output div {
      padding-bottom: 10px;
      word-wrap: break-word;
    }

    #noQRFound {
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>WBS QR Reader Subscriber</h1>
  <a id="githubLink" href="<?= $this->request->referer(); ?>">Back</a>
  <p>Pure JavaScript QR code decoding library.</p>
  <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
  <canvas id="canvas" hidden=""></canvas>
  <div id="output" hidden="">
    <div id="outputMessage">No QR code detected.</div>
    <div hidden=""><b>Data:</b> <span id="outputData"></span></div>
  </div>
<div class="row">
 <button id="flash" class="btn btn-primary btn-lg btn-block"><i class="fa fa-bolt" aria-hidden="true"></i></button>
</div>
<div>
<input type="hidden" name="competition_id" id="competition_id" value="<?= $competition_id ?>">
</div>
  <script>
    var video = document.createElement("video");
    var canvasElement = document.getElementById("canvas");
    var canvas = canvasElement.getContext("2d");
    var loadingMessage = document.getElementById("loadingMessage");
    var outputContainer = document.getElementById("output");
    var outputMessage = document.getElementById("outputMessage");
    var outputData = document.getElementById("outputData");
    var flash = document.getElementById("flash");
    var track;
    var torch = false;

    function drawLine(begin, end, color) {
      canvas.beginPath();
      canvas.moveTo(begin.x, begin.y);
      canvas.lineTo(end.x, end.y);
      canvas.lineWidth = 4;
      canvas.strokeStyle = color;
      canvas.stroke();
    }

    // Use facingMode: environment to attemt to get the front camera on phones
    navigator.mediaDevices.getUserMedia({ video: { facingMode: "environment" } }).then(function(stream) {
      track = stream.getTracks()[0];
      video.srcObject = stream;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.play();
      requestAnimationFrame(tick);
    });

    function tick() {
      loadingMessage.innerText = "⌛ Loading video..."
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        loadingMessage.hidden = true;
        canvasElement.hidden = false;
        outputContainer.hidden = false;

        canvasElement.height = video.videoHeight;
        canvasElement.width = video.videoWidth;
        canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
        var imageData = canvas.getImageData(0, 0, canvasElement.width, canvasElement.height);
        var code = jsQR(imageData.data, imageData.width, imageData.height, {
          inversionAttempts: "dontInvert",
        });
        if (code) {
          drawLine(code.location.topLeftCorner, code.location.topRightCorner, "#FF3B58");
          drawLine(code.location.topRightCorner, code.location.bottomRightCorner, "#FF3B58");
          drawLine(code.location.bottomRightCorner, code.location.bottomLeftCorner, "#FF3B58");
          drawLine(code.location.bottomLeftCorner, code.location.topLeftCorner, "#FF3B58");
          outputMessage.hidden = true;
          outputData.parentElement.hidden = false;
          outputData.innerText = code.data;
	  qrFound(code.data);
        } else {
          outputMessage.hidden = false;
          outputData.parentElement.hidden = true;
        }
      }
      requestAnimationFrame(tick);
    }

  flash.onclick = function() {
   if(torch){
     track.applyConstraints({advanced: [{torch: false}]});
     torch = false;
     flash.className="btn btn-primary btn-lg btn-block";
   }else{
     track.applyConstraints({advanced: [{torch: true}]});
     torch = true;
     flash.className="btn btn-default btn-lg btn-block";
   }
  }

  function qrFound(data){
    try {
        data = JSON.parse(data);
    } catch(e) {
        Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'QR invalido',
         });
    }
    if(data['user_id']){
    	loadUser(data['user_id']);
    }else{
    	Swal.fire({
        	icon: 'error',
                title: 'Oops...',
                text: 'QR invalido',
         });
   }
}
	
// instanciate new modal
var modal = new tingle.modal({
    footer: true,
    stickyFooter: false,
    closeMethods: ['overlay', 'button', 'escape'],
    closeLabel: "Close",
    cssClass: ['custom-class-1', 'custom-class-2'],
    onOpen: function() {
        console.log('modal open');
    },
    onClose: function() {
        console.log('modal closed');
    },
    beforeClose: function() {
        // here's goes some logic
        // e.g. save content before closing the modal
        return true; // close the modal
        return false; // nothing happens
    }
});


// add a button
modal.addFooterBtn('Agregar', 'tingle-btn tingle-btn--primary', function() {
    // here goes some logic
    var user_id = document.getElementById("user_id_modal").value;
    var competition_id = document.getElementById("competition_id").value;
    joinQR(user_id,competition_id);
    modal.close();
});

// add another button
modal.addFooterBtn('Cancelar', 'tingle-btn tingle-btn--danger', function() {
    // here goes some logic
    modal.close();
});

  function loadUser(value) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "/users/get-user?id=" + value);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function(e) {
            if (xhttp.readyState == 4) {
                if (xhttp.status === 200) {
                    xhttp.addEventListener('load', function(e) {
                        if (!xhttp.response == "") {
                            var freestyler = JSON.parse(xhttp.response);
                            writeFreestyler(freestyler);
                        }
                    });
                }
                if (xhttp.status === 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El usuario no existe',
                    });
                } else {
                    console.error(xhttp.status);
                }
            }
        }
        xhttp.send();
    }

    function writeFreestyler(data) {
        var innerModal = '<h1 style="color:black;">¿Seguro que quieres agregar a la competencia?</h1>';
        innerModal += '<div class="row">';
        innerModal += '<div class="col-md-3">';
        innerModal += '<img src="/img/'+data['data'].avatar+'" height="100px" width="100px">';
        innerModal += '</div>';
        innerModal += '<div class="col-md-3" style="color:black;">';
        innerModal += '<p>' + data['data'].aka + '</p>';
        innerModal += '<p>' + data['data'].email + '</p>';
        innerModal += '</div>';
        innerModal += '</div>';
        innerModal += '</div>';
        innerModal += '<input type="hidden" id="user_id_modal" name="user_id_modal" value="' + data['data'].id + '">';
        modal.setContent(innerModal)
        modal.open();
   }

    function joinQR(user_id,competition_id) {
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "/competitionsUsers/joinWithQR?user_id="+user_id+"&competition_id="+competition_id);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.onreadystatechange = function(e) {
            if (xhttp.readyState == 4) {
                if (xhttp.status === 200) {
                    xhttp.addEventListener('load', function(e) {
                        if (!xhttp.response == "") {
                            var resp = JSON.parse(xhttp.response);
                            console.log(resp);
                    Swal.fire({
                        icon: resp['icon'],
                        title: resp['title'],
                        text: resp['message'],
                    });

			
                        }
                    });
                }
                else {
                    console.error(xhttp.status);
                }
            }
        }
        xhttp.send();
    }

</script>
</body></html>
