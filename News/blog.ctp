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
                <a href="<?= $theme_config['join_us_url'] ?>" class="join">
                Toute les news
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
<section id="news">
    <div class="container">
        <div class="row">
            <?php
            if(!empty($search_news)) {
            $i = 0;
            foreach ($search_news as $k => $v) {
                $i++;
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="news-card">
                        <h6 class="news-title"><?= $v['News']['title'] ?></h6>
                        
                        <div class="news-body">
                            <p class="card-text">
                                <?= $this->Text->truncate($v['News']['content'], 400, array('ellipsis' => '...', 'html' => true))?></p>
                        </div>
                        <div class="news-footer text-center">
                            <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"
                               class="btn-news"><div style="display:inline">Lire plus</div> 
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } else { ?>
            <div class="col-lg-12"><h4 style="font-family: 'Concert One', sans-serif;margin-top:40px"><?= $Lang->get('NEWS__NONE_PUBLISHED') ?></h4></div>
            <?php } ?>
        </div>
    </div>
</section>
