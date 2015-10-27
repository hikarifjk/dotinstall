// myscript.js

$(function(){
  draw();
})

function draw() {
  var canvas = $('#mycanvas')[0];
  if (!canvas || !canvas.getContext) {
    return false;
  }
  var ctx = canvas.getContext('2d') ;

  ctx.fillStyle = "red";
  var y = 0;

  (function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (y > canvas.height) {
      y = -50;
    }
    y++;
    ctx.fillRect(0, y, 50, 50);
    setTimeout(loop, 10);
  })();

/*
  ctx.globalAlpha = 0.5;
  for (var i = 0; i < 100; i++) {
    var x = Math.floor(Math.random() * 400);
    var y = Math.floor(Math.random() * 200);
    var r = Math.floor(Math.random() * 200);

    ctx.fillStyle = "rgb(" + rgb() + "," + rgb() + "," + rgb() +  ")";
    ctx.beginPath();
    ctx.arc(x, y, r, 0, 2 * Math.PI);
    ctx.stroke();
    ctx.fill();

  }

  function rgb() {
    return Math.floor(Math.random() * 255);
  }


  ctx.fillStyle = "yellow";
  ctx.save();

  ctx.fillRect(0, 0, 50, 50);

  ctx.fillStyle = "blue";
  ctx.fillRect(100, 0, 50, 50);

  ctx.restore();
  ctx.fillRect(200, 0, 50, 50);




  var img = new Image();
  img.src = 'baby.jpg';
  img.src = 'dotinstall.jpeg';
  img.onload = function() {
    var pattern = ctx.createPattern(img, 'repeat');
    ctx.fillStyle = pattern;
    ctx.fillRect(20, 20, 80, 80);
    //ctx.drawImage(img,160, 10);
  }


  ctx.font= 'bold 20px Verdana';
  ctx.textAlign = 'left';
  ctx.fillStyle = 'red';
  ctx.strokeStyle = 'pink';
  ctx.fillText('dotinstall', 20, 20, 200);
  ctx.strokeText('dotinstall', 20, 120, 200);


  ctx.beginPath();
  ctx.arc(100, 100, 50, 10 / 180 * Math.PI, 210 / 180 + Math.PI);
  ctx.lineWidth = 15;
  //ctx.lineCap = 'round';
  ctx.lineCap = 'square';
  ctx.stroke();
//  ctx.fill();
*/
/*

  ctx.moveTo(20, 60);
  ctx.lineTo(140, 60);
  ctx.lineTo(140, 180);
  ctx.closePath();
  ctx.stroke();
  ctx.fill();

  ctx.strokeStyle = "rgba(255, 0, 0, 0.5)"
  ctx.lineWidth = 5;
  ctx.lineJoin = 'miter'
  ctx.fillStyle = "rgba(255, 0, 0, 0.5)"
  ctx.strokeRect(50, 10, 50, 150);

  // var g = ctx.createLinearGradient(0, 0, 0, 100);
  var g = ctx.createRadialGradient(50, 50, 20, 50, 50, 60);
  g.addColorStop(0.0, 'red');
  g.addColorStop(0.5, 'yellow');
  g.addColorStop(1.0, 'blue');
  ctx.fillStyle = g;


  ctx.shadowColor = '#ccc';
  ctx.shadowOffsetX = 5;
  ctx.shadowOffsetY = 5;
  ctx.shadowBlur = 2;

  ctx.globalAlpha = 0.5;

  ctx.scale(0.8, 0.8);
  ctx.rotate(30/180 * Math.PI);
  ctx.translate(100, 10);

  ctx.fillRect(0, 0, 100, 100);
  ctx.clearRect(15, 15, 20, 20);

*/
}
