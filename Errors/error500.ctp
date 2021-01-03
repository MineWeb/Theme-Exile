<section id="slider-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="icon">
                    <i class="fas fa-chart-area" style="padding-right: 5px;">
                    </i>
                    <?= $server_infos['GET_PLAYER_COUNT'] ?> Joueur<?php if($server_infos['GET_PLAYER_COUNT'] >= 2) echo 's';?> en ligne
                </div>

            </div>
            <div class="col-md-4 text-center">
                <a class="join">
                    Erreur
                </a>
            </div>
            <div class="col-md-4 text-right">
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
<section id="error">
    <div class="title">
	<?= $Lang->get('ERROR__500_LABEL') ?>
	</div>
	<div class="subtitle">
		<?= (isset($Lang)) ? $Lang->get('ERROR__INTERNAL_ERROR') : 'For know reason of this error, please change <pre>Configure::write(\'debug\', 0);</pre> to <pre>Configure::write(\'debug\', 3);</pre> in file <b>app/Config/core.php</b> line 34.' ?>
	</div>
</section>
