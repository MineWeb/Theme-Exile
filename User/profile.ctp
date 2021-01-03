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
                    Profil
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

<div id="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="profil-dialog">
                    <div class="profil-content">
                        <div class="profil-header title"><h3>Informations personnels</h3>
                        </div>
                        <div class="profil-body">
                            <div class="section2">
                                <p><b><?= $Lang->get('USER__USERNAME') ?> :</b> <?= $user['pseudo'] ?></p>
                            </div>
                            <div class="section2">
                                <p><b><?= $Lang->get('USER__EMAIL') ?> :</b> <span
                                            id="email"><?= $user['email'] ?></span>
                                </p>
                            </div>
                            <div class="section2">
                                <p>
                                    <b><?= $Lang->get('USER__RANK') ?> :</b>
                                    <?php foreach ($available_ranks as $key => $value) {
                                        if ($user['rank'] == $key) {
                                            echo $value;
                                        }
                                    } ?>
                                </p>
                            </div>
                            <?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                                <div class="section2">
                                    <p><b><?= $Lang->get('USER__MONEY') ?> :</b> <span
                                                class="money"><?= $user['money'] ?></span></p>
                                </div>
                            <?php } ?>

                            <div class="section2">
                                <p><b><?= $Lang->get('IP') ?> :</b> <?= $user['ip'] ?></p>
                            </div>

                            <div class="section2">
                                <p><b><?= $Lang->get('GLOBAL__CREATED') ?> :</b> <?= $Lang->date($user['created']) ?>
                                </p>
                            </div>
                            <div class="section2">
                                <div class="callout" id="twoFactorAuthStatus">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <a id="toggleTwoFactorAuth"
                                               data-status="<?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? '1' : '0' ?>"
                                               style="height: 51px; color: #ffffff; line-height: 55px; width: 58%; margin-top: -13px; border-radius: 4px;"
                                               class="btn-pl">Voulez-vous <span
                                                        id="twoFactorAuthStatusInfos"><?= (isset($twoFactorAuthStatus) && $twoFactorAuthStatus) ? 'désactiver' : 'activer' ?></span>
                                                la double authentification ?</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="twoFactorAuthValid" class="text-center" style="display: none;">
                                    <img src="" id="two-factor-auth-qrcode" alt=""/>
                                    <p>
                                        <small class="text-muted">Secret : <em id="two-factor-auth-secret"></em></small>
                                    </p>

                                    <form class="form-horizontal" method="POST" data-ajax="true"
                                          action="<?= $this->Html->url(array('plugin' => 'TwoFactorAuth', 'admin' => false, 'controller' => 'UserLogin', 'action' => 'validEnable')) ?>"
                                          data-callback-function="afterValidQrCode">
                                        <div class="ajax-msg"></div>

                                        <div class="form-group text-center">
                                            <label><?= $Lang->get('TWOFACTORAUTH__LOGIN_CODE') ?></label>
                                            <div class="col-md-6" style="margin: 0 auto;float: none;">
                                                <input type="text" class="form-control" name="code"
                                                       placeholder="<?= $Lang->get('TWOFACTORAUTH__LOGIN_CODE_PLACEHOLDER') ?>">
                                            </div>
                                        </div>

                                        <button type="submit"
                                                class="btn-pl"><?= $Lang->get('TWOFACTORAUTH__VALID_CODE') ?></button>
                                    </form>
                                </div>
                                <script type="text/javascript">
                                    $('#toggleTwoFactorAuth').on('click', function (e) {
                                        e.preventDefault()
                                        var btn = $(this)
                                        var status = parseInt(btn.attr('data-status'))

                                        // disable
                                        btn.html('<i class="fa fa-refresh fa-spin"></i>').addClass('disabled')

                                        // request to server
                                        if (!status) { // enable
                                            $.get('<?= $this->Html->url(array('controller' => 'UserLogin', 'action' => 'generateSecret', 'plugin' => 'TwoFactorAuth')) ?>', function (data) {
                                                // add qrcode
                                                $('#two-factor-auth-qrcode').attr('src', data.qrcode_url)
                                                $('#two-factor-auth-secret').html(data.secret)
                                                // edit display
                                                $('#twoFactorAuthStatus').slideUp(150)
                                                $('#twoFactorAuthValid').slideDown(150)
                                            })
                                        } else { // disable
                                            $.get('<?= $this->Html->url(array('controller' => 'UserLogin', 'action' => 'disable', 'plugin' => 'TwoFactorAuth')) ?>', function (data) {
                                                // edit display
                                                $('#toggleTwoFactorAuth').html('Voulez-vous activer la double authentification ?').removeClass('disabled').removeClass('btn-primary').addClass('btn-primary').attr('data-status', 0)
                                                $('#twoFactorAuthStatusInfos').html('activer')
                                            })
                                        }
                                    })

                                    function afterValidQrCode(req, res) {
                                        // edit display
                                        $('#toggleTwoFactorAuth').html('Voulez-vous désactiver la double authentification ?').removeClass('disabled').removeClass('btn-primary').addClass('btn-primary').attr('data-status', 1)
                                        $('#twoFactorAuthStatusInfos').html('désactiver')
                                        $('#twoFactorAuthValid').slideUp(150)
                                        $('#twoFactorAuthStatus').slideDown(150)
                                    }
                                </script>
                            </div>
                            <?= $Module->loadModules('user_profile') ?>
                            <?= $Module->loadModules('user_profile_messages') ?>

                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="col-md-6">
                <div class="profil-dialog">
                    <div class="profil-content">
                        <div class="profil-header title"><h3>Modifications</h3>
                        </div>
                        <div class="profil-body">
                            <h3 style="margin-top:20px;"><?= $Lang->get('USER__UPDATE_PASSWORD') ?></h3>

                            <form method="post" class="form-inline" data-ajax="true"
                                  style="margin-bottom:40px;margin-top:20px;"
                                  action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_pw')) ?>">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                           placeholder="<?= $Lang->get('USER__PASSWORD') ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                           placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM') ?>">
                                </div>
                                <br>

                                <div class="form-group" style="margin-top:-17px">
                                    <button class="btn-pro" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                </div>
                            </form>

                            <?php if ($Permissions->can('EDIT_HIS_EMAIL')) { ?>
                                <hr>

                                <h3><?= $Lang->get('USER__UPDATE_EMAIL') ?></h3>

                                <form method="post" class="form-inline" data-ajax="true"
                                      style="margin-bottom:40px;margin-top:20px;"
                                      action="<?= $this->Html->url(array('plugin' => null, 'controller' => 'user', 'action' => 'change_email')) ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="<?= $Lang->get('USER__EMAIL') ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email_confirmation"
                                               placeholder="<?= $Lang->get('USER__EMAIL_CONFIRM_LABEL') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top:-17px">
                                        <button class="btn-pro" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                        </button>
                                    </div>
                                </form>
                            <?php } ?>

                            <?php if ($shop_active) { ?>

                                <hr>

                                <h3><?= $Lang->get('SHOP__USER_POINTS_TRANSFER') ?></h3>

                                <form method="post" class="form-inline" data-ajax="true"
                                      style="margin-bottom:40px;margin-top:20px;"
                                      action="<?= $this->Html->url(array('plugin' => 'shop', 'controller' => 'payment', 'action' => 'transfer_points')) ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="to"
                                               placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_WHO') ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="how"
                                               placeholder="<?= $Lang->get('SHOP__USER_POINTS_TRANSFER_HOW_MANY') ?>">
                                    </div>

                                    <div class="form-group" style="margin-top:-17px">
                                        <button class="btn-pro" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                        </button>
                                    </div>
                                </form>

                            <?php } ?>


                            <?php if ($can_skin) { ?>
                                <hr>

                                <h3><?= $Lang->get('API__SKIN_LABEL') ?></h3>

                                <form class="form-inline" method="post" id="skin" method="post" data-ajax="true"
                                      style="margin-bottom:40px;margin-top:20px;"
                                      data-upload-image="true"
                                      action="<?= $this->Html->url(array('action' => 'uploadSkin')) ?>">
                                    <div class="form-group">
                                        <label><?= $Lang->get('FORM__BROWSE') ?></label>
                                        <input name="image" type="file">
                                    </div>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn-pro" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <div class="form-group">
                                        <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                                        - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                                        - <?= str_replace('{PIXELS}', $skin_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX'))
                                        ?><br>
                                        - <?= str_replace('{PIXELS}', $skin_height_max, $Lang->
                                        get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
                                    </div>
                                </form>
                            <?php } ?>

                            <?php if ($can_cape) { ?>
                                <hr>

                                <h3><?= $Lang->get('API__CAPE_LABEL') ?></h3>

                                <form class="form-inline" method="post" id="cape" method="post" data-ajax="true"
                                      style="margin-bottom:40px;margin-top:20px;"
                                      data-upload-image="true"
                                      action="<?= $this->Html->url(array('action' => 'uploadCape')) ?>">
                                    <div class="form-group">
                                        <label><?= $Lang->get('FORM__BROWSE') ?></label>
                                        <input name="image" type="file">
                                    </div>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button type="submit"
                                            class="btn-pl"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <div class="form-group">
                                        <u><?= $Lang->get('USER__PROFILE_FORM_IMG') ?> :</u><br>

                                        - <?= $Lang->get('USER__IMG_UPLOAD_TYPE_PNG') ?><br>
                                        - <?= str_replace('{PIXELS}', $cape_width_max, $Lang->get('USER__IMG_UPLOAD_WIDTH_MAX'))
                                        ?><br>
                                        - <?= str_replace('{PIXELS}', $cape_height_max, $Lang->
                                        get('USER__IMG_UPLOAD_HEIGHT_MAX')) ?><br>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($EyPlugin->isInstalled('kenshimdev.xenbridge')) { ?>
                <div class="col-md-12">
                    <div class="profil-dialog">
                        <div class="profil-content">
                            <div class="profil-header title"><h3><?= $Lang->get('XENBRIDGE_STATS_FORUM') ?></h3>
                            </div>
                            <div class="profil-body">
                                <?= $Module->loadModules('user_profile_forum') ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($EyPlugin->isInstalled('eywek.shop')) { ?>
                <div class="col-md-12">
                    <div class="profil-dialog">
                        <div class="profil-content">
                            <div class="profil-header title"><h3><?= $Lang->get('SHOP__HISTORY_PURCHASES') ?></h3>
                            </div>
                            <div style="margin-bottom: -1rem;">
                                <div class="profil-body">
                                    <table class="table table-bordered" id="users">
                                        <thead>
                                        <tr>
                                            <th><?= $Lang->get('DASHBOARD__PURCHASES') ?> ID</th>
                                            <th><?= $Lang->get('GLOBAL__CREATED') ?></th>
                                            <th><?= $Lang->get('SHOP__ITEM_PRICE') ?></th>
                                            <th class="right"><?= $Lang->get('SHOP__ITEMS') ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($histories as $value) { ?>
                                            <tr>
                                                <td><?= $value["ItemsBuyHistory"]["id"] ?></td>
                                                <td><?= $value["ItemsBuyHistory"]["created"] ?></td>
                                                <td><?= $value["Item"]["price"] ?></td>
                                                <td><?= $value["Item"]["name"] ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>