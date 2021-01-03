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
                Connexion
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
<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="thumbnail text-center" style="padding:15px">
                    <form id="login-before-two-factor-auth" class="sign__form" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>" data-callback-function="afterLogin">
                        <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>" />
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="pseudo" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>" type="text" autofocus />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                </span>
                                <input class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>" type="password" autofocus />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <input type="checkbox" name="remember_me">
                                        <?= $Lang->get('USER__REMEMBER_ME') ?>
                                        
                                    </div>
                                    <div class="col-6 text-right">
                                        <a data-dismiss="modal" href="#" data-toggle="modal" data-target="#lostpasswd" class="sign__forgot">Mot de passe oublié ?</a>
                                        <input type="submit" class="btn-pl" value="<?= $Lang->get('USER__LOGIN') ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="login-two-factor-auth" style="display:none;" class="form-horizontal" method="POST" data-ajax="true"
                          action="<?= $this->Html->url(array('plugin' => 'TwoFactorAuth', 'admin' => false, 'controller' => 'UserLogin', 'action' => 'validLogin')) ?>"
                          data-redirect-url="?">
                        <div class="modal-body">
                            <div class="ajax-msg"></div>
                            <input type="checkbox" style="display: none;" name="remember_me">
                            <div class="form-group text-center">
                                <div class="col-md-12" style="margin: 0 auto;float: none;">
                                    <input type="text" class="form__input" name="code" placeholder="Code d'authentification">
                                </div>
                            </div>
                            <button type="submit" class="btn-pl">Valider</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function afterLogin(req, res) {
        if (res['two-factor-auth'] === undefined)
            return window.location = '?t_' + Date.now()
        $('#login-two-factor-auth input[name="remember_me"]').attr('checked', $('#login-before-two-factor-auth input[name="remember_me"]').is(':checked'))
        $('#login-before-two-factor-auth').slideUp(150)
        $('#login-two-factor-auth').slideDown(150)
    }
</script>