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
                <?= $Lang->get('CCADEAU__TITLE'); ?>
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
<section id="code">
    <div class="container">
        <div class="code">
            <div class="code-body">
                <h4><?= $Lang->get('CCADEAU__HELP'); ?></h4>
                <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'Code', 'action' => 'claim_code')) ?>" data-redirect-url="?">
                    <div class="ajax-msg"></div>
                    <label><?= $Lang->get("CCADEAU__EXEMPLE_CODE"); ?></label>
                    <input class="form-control" type="text" name="code_cadeau"><br />
                    <button class="btn btn-primary"><?= $Lang->get("CCADEAU__CLAIM_BTN"); ?></button>
                </form>
            </div>
        </div>
    </div>
</section>