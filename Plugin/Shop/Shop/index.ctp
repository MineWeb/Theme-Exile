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
                    Boutique
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
<section id="shop-up">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="shop-up">
                    <div class="row">
                        <div class="col-md-5">
                            <?php if ($isConnected) { ?>
                                <a style="opacity: 1;" class="btn-shop">
                                    <?= $money ?>
                                </a>
                                <?php if ($Permissions->can('CREDIT_ACCOUNT')) { ?>
                                    <a href="#" data-toggle="modal" data-target="#addmoney"
                                       class="btn-shop"
                                       style="background-color:#1e6bcc"><?= $Lang->get('SHOP__ADD_MONEY') ?></a>
                                <?php } ?>
                                <a href="#" data-toggle="modal" data-target="#cart-modal"
                                   class="btn-shop"><?= $Lang->get('SHOP__BUY_CART') ?></a>
                            <?php } else { ?>
                                <a class="btn-shop" style="background-color:#1e6bcc">Vous êtes déconnecté.</a>
                            <?php } ?>
                        </div>
                        <div class="col-md-7">
                            <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
                                <ul class="navbar-nav nav-main">

                                    <?php foreach ($search_sections as $v) { ?>

                                        <li class="dropdown">
                                            <a href="#" class="nav-link js-scroll-trigger" data-toggle="dropdown"
                                               role="button"
                                               aria-expanded="false"><?= before_display($v['Section']['name']) ?> <i
                                                        class="fa fa-angle-down"></i></a>

                                            <ul class="dropdown-menu" role="menu">
                                                <?php foreach ($search_categories_section[$v['Section']['id']] as $va) { ?>
                                                    <li><a class="title-drop"
                                                           href="<?= $this->Html->url(array('controller' => 'c/' . $va['Category']['id'], 'plugin' => 'shop')) ?>"><?= before_display($va['Category']['name']) ?></a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <?php foreach ($search_categories_without_section as $v) { ?>
                                        <li>
                                            <a href="<?= $this->Html->url(array('controller' => 'c/' . $v['Category']['id'], 'plugin' => 'shop')) ?>"
                                               class="nav-link js-scroll-trigger<?= (isset($category) and $v['Category']['id'] == $category or !isset($category) and $i == 1) ? ' active' : ''; ?>"><?= before_display($v['Category']['name']) ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="shop">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12"><?= $vouchers->get_vouchers() // Les promotions en cours  ?>
                    </div>
                </div>

                <div class="row">
                    <?php
                    $col = 4;
                    $i = 0;
                    foreach ($search_items as $k => $v) {
                        if (!isset($category) and $v['Item']['category'] == $search_first_category or isset($category) and $v['Item']['category'] == $category) {
                            $i++;
                            ?>
                            <div class="col-lg-4">
                                <div class="shop-card">
                                    <h6 class="shop-title"><?= $v['Item']['name'] ?></h6>

                                    <div class="shop-body">
                                        <?php if (isset($v['Item']['img_url'])) { ?><img class="img-responsive"
                                                                                         style="max-height: 250px;min-height: 250px;margin-right: auto;max-width: 100%;display: block;margin-left: auto;"
                                                                                         src="<?= $v['Item']['img_url'] ?>"
                                                                                         alt=""><?php } ?>
                                    </div>
                                    <div class="shop-footer">
                                        <div class="btn-sho">
                                            <button class="btn-sho-2 display-item"
                                                    data-item-id="<?= $v['Item']['id'] ?>"><?= $Lang->get('SHOP__BUY') ?>
                                                <div class="text-right-shop">
                                                    <span style="margin-left:15px"><?= $v['Item']['price'] ?><?php if ($v['Item']['price'] == 1) {
                                                            echo ' ' . $singular_money;
                                                        } else {
                                                            echo ' ' . $plural_money;
                                                        } ?></span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script type="text/javascript">
    var LOADING_MSG = '<?= $Lang->get('GLOBAL__LOADING') ?>';
    var ADDED_TO_CART_MSG = '<?= $Lang->get('SHOP__BUY_ADDED_TO_CART') ?> <i class="fa fa-check"></i>';
    var CART_EMPTY_MSG = '<?= $Lang->get('SHOP__BUY_CART_EMPTY') ?>';
    var ITEM_GET_URL = '<?= $this->Html->url(array('controller' => 'shop/ajax_get', 'plugin' => 'shop')); ?>/';
    var VOUCHER_CHECK_URL = '<?= $this->Html->url(array('action' => 'checkVoucher')) ?>/';
    var BUY_URL = '<?= $this->Html->url(array('action' => 'buy_ajax')) ?>';

    var CART_ITEM_NAME_MSG = '<?= $Lang->get('SHOP__ITEM_NAME') ?>';
    var CART_ITEM_PRICE_MSG = '<?= $Lang->get('SHOP__ITEM_PRICE') ?>';
    var CART_ITEM_QUANTITY_MSG = '<?= $Lang->get('SHOP__ITEM_QUANTITY') ?>';
    var CART_ACTIONS_MSG = '<?= $Lang->get('GLOBAL__ACTIONS') ?>';

    var CSRF_TOKEN = '<?= $csrfToken ?>';
</script>
<?= $this->Html->script('Shop.jquery.cookie') ?>
<?= $this->Html->script('Shop.shop') ?>
<?= $this->Html->script('Shop.jquery.bootstrap-touchspin.js') ?>
<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header">
                <button type="button" class="close" data-dismiss="modal"><i style="color:white"
                                                                            class="fa fa-window-minimize "></i><span
                            class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
                <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CONFIRM') ?></h4>
            </div>

            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card-header">
                <button type="button" class="close" data-dismiss="modal"><i style="color:white"
                                                                            class="fa fa-window-minimize "></i><span
                            class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
                <h4 class="modal-title"><?= $Lang->get('SHOP__BUY_CART') ?></h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="card-footer">
                <div class="pull-left">
                    <input name="cart-voucher" type="text" class="form-control" autocomplete="off" id="cart-voucher"
                           style="width:245px;" placeholder="<?= $Lang->get('SHOP__BUY_VOUCHER_ASK') ?>">
                </div>
                <button class="btn" style="margin-left:5px;"><?= $Lang->get('SHOP__ITEM_TOTAL') ?> : <span
                            id="cart-total-price">0</span> <?= $Configuration->getMoneyName() ?>
                </button>
                <button type="button" class="btn-shop" style="background-color:#1e6bcc"
                        id="buy-cart"><?= $Lang->get('SHOP__BUY') ?></button>
            </div>
        </div>
    </div>
</div>
<?= $this->element('payments_modal') ?>
