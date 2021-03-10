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
                Starpass
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
<section id="starpass-up">
    <div class="container">
        <div class="title text-center">
        <?= $Lang->get('SHOP__STARPASS_PAYMENT') ?>
        </div>
        <div class="subtitle text-center">
        1 code = <?= $money ?> <?= $Configuration->getMoneyName() ?>
        </div>
    </div>
</section>
<section id="shop">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						 <div id="starpass_<?= $idd ?>"></div>
						  <script type="text/javascript" src="//script.starpass.fr/script.php?idd=<?= $idd ?>&amp;verif_en_php=1&amp;datas=<?= $id ?>"></script>
						  <noscript>Veuillez activer le Javascript de votre navigateur s'il vous pla&icirc;t.<br />
							<a href="http://www.starpass.fr/">Micro Paiement StarPass</a>
						  </noscript>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
