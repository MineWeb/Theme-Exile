<?= $this->Html->css('Staff.style.css') ?>
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
                Staff
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
<section id="staff">
    <div class="container">
        <div class="row">
            <?php foreach ($staffs as $staff): ?>
                <div class="col-md-4">
                    <div class="thumbnail text-center" style="padding:15px">
                        
                        <div class="staff-card text-center">
                            <div class="staff-header">
                                <a class="staff-usernam"><?= $staff['Staff']['username'] ?></a>
                            </div>
                            <div class="staff-body">
                                <div>
                                    <img class="img-circle responsive-img" width="64" src="<?= $this->Html->url(array('controller' => 'API', 'action' => 'get_head_skin/', 'plugin' => false, $staff['Staff']['username'], 64)) ?>" alt="">
                                </div>
                                <p class="staff-rank" style="color:<?= $staff['Staff']['color'] ?>"><?= $staff['Staff']['rank'] ?></p>
                            </div>
                            <div class="staff-footer">
                                <div class="">
                                    <?php if(!empty($staff['Staff']['facebook_url'])): ?>
                                        <a target="_blank" class="staff-i staff-facebook" href="<?= $staff['Staff']['facebook_url']; ?>"><i class="fab fa-facebook fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['reddit_url'])): ?>
                                        <a target="_blank" class="staff-i staff-reddit" href="<?= $staff['Staff']['reddit_url']; ?>"><i class="fab fa-reddit fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['twitter_url'])): ?>
                                        <a target="_blank" class="staff-i staff-twitter" href="<?= $staff['Staff']['twitter_url']; ?>"><i class="fab fa-twitter fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['googleplus_url'])): ?>
                                        <a target="_blank" class="staff-i staff-googleplus" href="<?= $staff['Staff']['googleplus_url']; ?>"><i class="fab fa-google-plus-g fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['youtube_url'])): ?>
                                        <a target="_blank" class="staff-i staff-youtube" href="<?= $staff['Staff']['youtube_url']; ?>"><i class="fab fa-youtube fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['weibo_url'])): ?>
                                        <a target="_blank" class="staff-i staff-weibo" href="<?= $staff['Staff']['weibo_url']; ?>"><i class="fab fa-weibo fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['github_url'])): ?>
                                        <a target="_blank" class="staff-i staff-github" href="<?= $staff['Staff']['github_url']; ?>"><i class="fab fa-github fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                    <?php if(!empty($staff['Staff']['instagram_url'])): ?>
                                        <a target="_blank" class="staff-i staff-instagram" href="<?= $staff['Staff']['instagram_url']; ?>"><i class="fab fa-instagram fa-2x" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>