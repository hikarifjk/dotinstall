enchant();

window.onload = function() {

  var core = new Core(320, 320);
  core.preload('chara1.png');
  core.fps = 15;

  core.onload = function() {
    var remainTime = 80;
    $('#timeValue').text(remainTime);

    core.on('enterframe', function(){
      remainTime--;
      $('#timeValue').text(remainTime);
      if (remainTime < 1) {
        alert('Your Score is ' + $('#scoreValue').text());
        core.stop();
      }
    });

    $('#scoreValue').text(0);

    var Bear = Class.create(Sprite, {
      initialize: function(x, y){
        Sprite.call(this, 32, 32);
        this.x = x;
        this.y = y;
        this.frame = 1;
        this.opacity = 10;
        this.image = core.assets['chara1.png'];


        var that = this;
        this.on('touchstart', function(){
          $('#scoreValue').text($('#scoreValue').text() * 1 + 1);
          this.x = rand(300);
          this.y = rand(300);
        });
        core.rootScene.addChild(this);
      }

    });

    var bear = new Bear(10, 30);

  }
  core.start();

};

function rand(n) {
  return Math.floor(Math.random() * (n + 1));
};
