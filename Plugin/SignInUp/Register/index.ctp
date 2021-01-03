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
                <a class="join">
                    <?= $Lang->get('USER__REGISTER') ?>
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
<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="thumbnail text-center" style="padding:15px">
                    <form method="post" data-redirect-url="?" data-ajax="true"
                          action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_register')) ?>">
                        <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>"/>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="pseudo"
                                       placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="password"
                                       placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password"
                                       autofocus/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="password_confirmation"
                                       placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>" type="password"
                                       autofocus/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="email"
                                       placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>" type="text" autofocus/>
                            </div>
                        </div>
                        <?php if ($captcha['type'] == "google") { ?>
                            <script src='https://www.google.com/recaptcha/api.js'></script>
                            <div class="form-group">
                                <h5><?= $Lang->get('FORM__CAPTCHA') ?></h5>
                                <div class="g-recaptcha" data-sitekey="<?= $captcha['siteKey'] ?>"></div>
                            </div>
                        <?php } else if ($captcha['type'] == "hcaptcha") { ?>
                            <script src='https://www.hCaptcha.com/1/api.js' async defer></script>
                            <div class="form-group">
                                <h5><?= $Lang->get('FORM__CAPTCHA') ?></h5>
                                <div class="h-captcha" data-sitekey="<?= $captcha['siteKey'] ?>"></div>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <?= $this->Html->image(array('controller' => 'user', 'action' => 'get_captcha', 'plugin' => false, 'admin' => false), array('plugin' => false, 'admin' => false, 'id' => 'captcha_image')); ?>
                                <a href="javascript:void(0);" id="reload"><i class="fa fa-refresh"></i></a>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </span>
                                    <input type="text" class="form-control" name="captcha" id="inputPassword3"
                                           placeholder="<?= $Lang->get('FORM__CAPTCHA_LABEL') ?>">
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <div class="checkbox">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <?php if (!empty($condition)) { ?>
                                            <input type="checkbox" name="condition">
                                            <?= $Lang->get('USER__CONDITION_1') ?> <a
                                                    href="<?= $condition ?>"> <?= $Lang->get('USER__CONDITION_2') ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-6 text-right">
                                        <input type="submit" class="btn-pl"
                                               value="<?= $Lang->get('USER__REGISTER') ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>