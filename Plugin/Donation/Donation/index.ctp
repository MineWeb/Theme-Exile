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
                Donation
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
<section id="don">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section>
                        <div id="text-page">
                            <div class="col-md-12">
                                <div style="width: 100%;" class="panel panel-primary">
                                    <div class="container">
                                        <div class="title text-center">
                                        <?= $Lang->get("TITLE_PANEL") ?>
                                        </div>
                                        <?php if(isset($_SESSION['flash'])): ?>
                                            <?php foreach($_SESSION['flash'] as $type => $message) : ?>
                                                <div class="alert alert-<?= $type; ?>">
                                                    <?= $message; ?>
                                                </div>
                                            <?php endforeach; ?>
                                            <?php unset($_SESSION['flash']); ?>
                                        <?php endif; ?>
                                        <div class="subtitle">
                                            <?php foreach($datas as $data) { ?>
                                                <?php if(!empty($data['Infos']['msg'])) { ?>
                                                    <?= $data['Infos']['msg']; ?>
                                                <?php } else { ?>
                                                    Créer un serveur c'est bien, mais pour cela divers frais rentrent en jeu.<br>
                                                    Chaque mois, nous devons payer nos machines sur lesquels sont hébergés notre site internet mais surtout notre serveur Minecraft.<br>
                                                    Nous devons également payer les développeurs qui sont derrières, qui permettent jour après jour d'ajouter et améliorer les fonctionnalités du serveur.<br>
                                                    <br>
                                                    En effectuant un don, vous ne gagnez pas de <?= $Configuration->getMoneyName() ?>, mais vous nous remerciez pour le serveur que nous vous proposons !
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="don">
                                        <div class="don-body">
                                            <?php $pourcentage = ($montant_total * 100 / $data['Infos']['objectif']); ?>
                                            <?php $pourcentage = str_replace(',', '.', $pourcentage); ?>
                                            <?php $pourcentage = number_format($pourcentage, 0, '.', ''); ?>
                                            <blockquote style="padding-left:10px;border-left: 5px solid <?= $data['Infos']['color'] ?>;">
                                                Objectif actuel : <?= $data['Infos']['objectif']; ?>€<br>
                                                Montant total des dons : <?= $montant_total; ?>€<br>
                                                Pourçentage : <?= $pourcentage ?>%
                                            </blockquote>

                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
                                                     aria-valuenow="<?= $pourcentage ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?= $pourcentage ?>%;">
                                                </div>
                                            </div>
                                            
                                            <?php foreach($datas as $data) { ?>

                                                <?php if(!empty($data['Infos']['user'] && $data['Infos']['password'] && $data['Infos']['signature'])) { ?>

                                                    <?php if($isConnected) { ?>

                                                        <?php if(isset($_POST['montant']) && !empty($_POST['montant']) && !preg_match('/^[a-zA-Z]+$/', $_POST['montant'])) { ?>
                                                            <form method="post" action="<?= $paypal ?>">
                                                                <input style="margin-top:20px;" name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                                                                </div>
                                                                <button type="submit" class="btn btn-don btn-success btn-block"><?= $Lang->get("VALIDATE_PAYPAL") ?> <?= $_POST['montant'] ?>€</button>
                                                            </form>
                                                        <?php } else { ?>
                                                            <form method="post">
                                                                <div class="form-group">
                                                                    <input style="margin-top:20px;" type="text" name="montant" class="form-control" placeholder="<?= $Lang->get("PLACEHOLDER_INPUT_MONTANT") ?>" />
                                                                </div>
                                                                <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden" />
                                                                </div>
                                                                <button type="submit" class="btn btn-don btn-success btn-block"><?= $Lang->get("CONTINUER") ?></button>
                                                            </form>
                                                        <?php } ?>
                                        
                                                    <?php  } else { ?>
                                                        <button type="button" class="btn btn-danger btn-don btn-block" disabled><?= $Lang->get("LOGIN_REQUIRE") ?></button>
                                                    <?php } ?>

                                                <?php  } else { ?>
                                                    <button type="button" class="btn btn-danger btn-don btn-block" disabled><?= $Lang->get("NO_DONS") ?></button>
                                                <?php } ?>

                                            <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>