
<style>.cps:hover{background-color: #D8D8D8; cursor: 	Pointer; text-align: center;} .cps{text-align: center;  } .cps:selection {background : transparent;}
.cps{
user-select: none;
-moz-user-select: none;
-khtml-user-select: none;
-webkit-user-select: none;
}
.textc{padding-top: 50px; padding-bottom: 50px;}
</style>

<!-- HTML -->
<section id="slider-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4  text-center">
                <div class="icon">
                    <i class="fas fa-chart-area" style="padding-right: 5px;">
                    </i>
                    <?= $server_infos['GET_PLAYER_COUNT'] ?> Joueur<?php if($server_infos['GET_PLAYER_COUNT'] >= 2) echo 's';?> en ligne
                </div>
                
            </div>
            <div class="col-md-4 text-center">
                <a class="join">
                CPS
                </a>
            </div>
            <div class="col-md-4 text-center">
                <div class="icon">
                    <?= $theme_config['ip'] ?>
                    <i id="copy-ip" data-clipboard-text="<?= $theme_config['ip'] ?>" class="fas fa-file" aria-hidden="true">
                    </i>
                    <?= $this->Html->script('clipboard.min.js') ?>
                    <script>
                    var clipboard = new Clipboard('#copy-ip');

                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="news-up">
    <div class="container">
        <div class="title text-center">
        <?= $Lang->get('COUNTER'); ?>
        </div>
        <div class="subtitle">
        &Agrave; la seconde ou vous cliquer, un chronometre se lance et vous disposez de 10 secondes pour cliquez un maximum
    de fois.<br>
    Grace &agrave; ce nombre de clics, nous pourront definir votre CPS !
            <p id="aff"><br><?= $Lang->get('CLICK__NUMBER') ?> : </p>
            <p id="cps"><?= $Lang->get('CPS__NUMBER') ?> : </p>
        </div>
        <div class="subtitle">
            <p id="bip">Timer: 0</p>
        </div>
    </div>
</section>
<div class="container">
    <div class="well well-large cps" id="countcps">

            <div class="click-div textc">
                <?= $Lang->get('START') ?>
            </div>

    </div>
</div><br><br>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
  var clicks = 0;
  var timer = 10;
  var x;
  var begin = false;

  $('.click-div').click(function () {
    if (!begin) {
      startTimer();
    }
    else {
      addClick()
    }
  })

  function addClick()
  {
    clicks++;
    $('#aff').html('<br><?= $Lang->get("CLICK__NUMBER") ?> : ' + clicks)
  }

  function startTimer() {
    begin = true;
    x = setInterval(updateTimer, 1000);
    $('.click-div').html('CLIQUEZ');
    $('#bip').html('Timer: ' + timer + " secondes.")
    $('#aff').html('<br><?= $Lang->get("CLICK__NUMBER") ?> :')
    $('#cps').html('<?= $Lang->get("CPS__NUMBER") ?> :')
  }

  function stopTimer() {
    begin = false;
    clearInterval(x);
    $('#news-up #bip').html('Timer: 0')
    $('#news-up #cps').html('Nombre de CPS : '+(clicks/10))
    alert('Vous avez fait ' + (clicks/10) + ' cps')
    timer = 10;
    clicks = 0;
    $('.click-div').html('<?= $Lang->get("RESTART") ?>');
  }

  function updateTimer() {
    timer--;
    if (timer > 0) {
      if (timer == 1) {
        var suffix = " seconde.";
      } else {
        var suffix = " secondes.";
      }
      $('#bip').html('Timer: ' + timer + " " + suffix)
    }
    else {
      stopTimer()
    }
  }
</script>
