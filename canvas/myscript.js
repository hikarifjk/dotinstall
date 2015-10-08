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
  ctx.strokeRect(50, 10, 50, 150);
  ctx.fillRect(10, 10, 50, 50);
  ctx.clearRect(15, 15, 20, 20);
}
