<section id="slider-2">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="icon">
                    <i class="fas fa-chart-area" style="padding-right: 5px;">
                    </i>
                    <?= $server_infos['GET_PLAYER_COUNT'] ?>
                    Joueur<?php if ($server_infos['GET_PLAYER_COUNT'] >= 2) echo 's'; ?> en ligne
                </div>

            </div>
            <div class="col-md-4 text-center">
                <a href="<?= $theme_config['join_us_url'] ?>" class="join">
                    <i class="fa fa-angle-right arrow"></i>
                    Nous rejoindre
                    <i class="fa fa-angle-left arrow-2"></i>
                </a>
            </div>
            <div class="col-md-4 text-right">
                <div class="icon">
                    <?= $theme_config['ip'] ?>
                    <i id="copy-ip" data-clipboard-text="<?= $theme_config['ip'] ?>" class="fas fa-file"
                       aria-hidden="true">
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
            Découvrez <?= $website_name ?>
        </div>
        <div class="subtitle text-center">
            Nos dernières actualités vous permettrons de suivre le développement du serveur.
        </div>
    </div>
</section>

<section id="news">
    <div class="container">
        <div class="row">
            <?php
            if (!empty($search_news)) {
                $i = 0;
                foreach ($search_news as $k => $v) {
                    $i++;
                    if ($i > 3) {
                        break;
                    }
                    ?>
                    <div class="col-lg-4 mb-4">
                        <div class="news-card">
                            <h6 class="news-title"><?= $v['News']['title'] ?></h6>

                            <div class="news-body">
                                <p class="card-text">
                                    <?= $this->Text->truncate($v['News']['content'], 400, array('ellipsis' => '...', 'html' => true)) ?>
                                </p>
                            </div>
                            <div class="news-footer text-center">
                                <a href="<?= $this->Html->url(array('controller' => 'blog', 'action' => $v['News']['slug'])) ?>"
                                   class="btn-news">
                                    <div style="display:inline">Lire plus</div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-lg-12"><h4
                            style="font-family: 'Concert One', sans-serif;margin-top:40px"><?= $Lang->get('NEWS__NONE_PUBLISHED') ?></h4>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<hr style="width:70%;">
<section id="vote-up">
    <div class="container">
        <div class="title text-center">
            Nos meilleurs voteurs
        </div>
        <div class="subtitle text-center">
            Votez vous permet de nous soutenir et d'obtenir des récompenses en jeu !
        </div>
    </div>
</section>
<section id="vote">
    <div class="container">
        <div class="row">
            <?php if ($EyPlugin->isInstalled('eywek.vote')) { ?>
                <?php
                $users_vote = ClassRegistry::init('Vote.Vote')->find('all', [
                    'fields' => ['username', 'COUNT(id) AS count'],
                    'conditions' => ['created LIKE' => date('Y') . '-' . date('m') . '-%'],
                    'order' => 'count DESC',
                    'group' => 'username',
                    'limit' => 6
                ]);
                ?>
            <?php } else { ?>
                <div class="alert alert-danger"><b>Erreur :</b> Le plugin vote n'est pas installé.</div>
            <?php } ?>
            <?php $i_cl = 0;
            foreach ($users_vote as $userv): $i_cl++; ?>
                <div class="col-lg-2">
                    <div class="vote">
                        <div class="title-votes">Top <?= $i_cl; ?></div>
                        <div class="vote-body">
                            <img width="50" style="border-radius: 50%;"
                                 src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $userv['Vote']['username'], 128)) ?>"><br>
                            <strong class="player-name"
                                    style="text-transform: uppercase"><?= $userv['Vote']['username']; ?></strong>

                            <div class="votes"><?= $userv[0]['count']; ?>
                                vote<?php if ($userv[0]['count'] == 1) { ?><?php } else { ?>s<?php } ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($theme_config['trailer_id'])) { ?>
    <section id="yt">
        <div class="section section--bg" data-bg="https://i.goopics.net/PdrgO.png"
             style="background: url('https://i.goopics.net/PdrgO.png') center center / cover no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="col-md-6 offset-md-3">
                            <h2 class="section__title section__title--white"
                                style="font-size: 30px;margin-bottom: 20px;">Découvrez notre trailer !</h2>
                            <a class="section__video video-btn" data-toggle="modal"
                               data-src="//www.youtube.com/embed/<?= $theme_config['trailer_id'] ?>"
                               data-target="#myModal"><i class="fas fa-play-circle"></i></a>
                            <script>
                                $(document).ready(function () {
                                    var $videoSrc;
                                    $('.video-btn').click(function () {
                                        $videoSrc = $(this).data("src");
                                    });
                                    console.log($videoSrc);
                                    $('#myModal').on('shown.bs.modal', function (e) {

                                        $("#video").attr('src', $videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
                                    })


                                    $('#myModal').on('hide.bs.modal', function (e) {

                                        $("#video").attr('src', $videoSrc);
                                    })
                                });
                            </script>

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <iframe class="embed-responsive-item" src="" id="video"
                                                        allowscriptaccess="always"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="section__text section__text--white section__text--head">Cette courte vidéo vous
                                permet d'avoir un premier avis sur la qualité de notre serveur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>