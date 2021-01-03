<section id="navbar">
    <div style="margin-left:15px;margin-right:15px;" class="row">
        <div class="col-md-2 text-center server-col">
            <div class="server">
                <?= $website_name ?>
            </div>
            <div class="server-2">
                <button class=" navbar-toggler navbar-toggler-right icon-nav" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fa fa-bars icon"></i>
                </button>
            </div>
        </div>
        <div class="col-md-6 nav-1 d-flex justify-content-center">
            <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">

                <div class="collapse navbar-collapse" id="navbarResponsive" aria-expanded="true">
                    <ul class="navbar-nav nav-main text-center">
                        <li class="nav-item"><a href="<?= $this->Html->url('/') ?>"
                                                class="<?php if ($this->here == $this->Html->url('/')) { ?>active<?php } ?> nav-link w-100 js-scroll-trigger"><?= $Lang->get('GLOBAL__HOME') ?></a>
                        </li>
                        <?php if (!empty($nav)): ?>
                            <?php $i = 0; ?>
                            <?php foreach ($nav as $key => $value): ?>
                                <?php if (empty($value['Navbar']['submenu'])): ?>
                                    <li class="nav-item">
                                        <a class="<?php if ($this->here == $value['Navbar']['url']) { ?>active<?php } ?> nav-link w-100 js-scroll-trigger"
                                           href="<?= $value['Navbar']['url'] ?>">
                                            <?php if (!empty($value['Navbar']['icon'])): ?>
                                                <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                                            <?php endif; ?>
                                            <?= $value['Navbar']['name'] ?>
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a href="#" class="nav-link w-100 js-scroll-trigger" data-toggle="dropdown"
                                           role="button"
                                           aria-expanded="false">
                                            <?php if (!empty($value['Navbar']['icon'])): ?>
                                                <i class="fa fa-<?= $value['Navbar']['icon'] ?>"></i>
                                            <?php endif; ?>
                                            <?= $value['Navbar']['name'] ?>
                                            <i class="fa fa-angle-down">
                                            </i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">

                                            <?php
                                            $submenu = json_decode($value['Navbar']['submenu']);
                                            foreach ($submenu as $k => $v) {
                                                ?>
                                                <li>
                                                    <div class="dropd-menu">
                                                        <a class="title-drop"
                                                           href="<?= rawurldecode(rawurldecode($v)) ?>"<?= ($value['Navbar']['open_new_tab']) ? 'target="_blank"' : '' ?>>
                                                            <?= rawurldecode(str_replace('+', ' ', $k)) ?>
                                                        </a>
                                                    </div>
                                                </li>
                                            <?php } ?>

                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-md-4 nav-2 d-flex justify-content-center">
            <nav class="navbar navbar-expand navbar-light" id="mainNav">
                <div class="collapse navbar-collapse" id="navbarResponsive" aria-expanded="true">
                    <ul class="navbar-nav nav-main">
                        <?php if (!$isConnected) { ?>

                            <?php if ($EyPlugin->isInstalled('phpierre.signinup')) { ?>
                                <li class="nav-item"><a
                                            class="<?php if ($this->here == "/login") { ?>active<?php } ?> nav-link js-scroll-trigger"
                                            href="/login">Connexion</a></li>
                                <li class="nav-item"><a
                                            class="<?php if ($this->here == "/register") { ?>active<?php } ?> nav-link js-scroll-trigger"
                                            href="/register">S'inscrire</a></li>
                            <?php } else { ?>
                                <li class="nav-item"><a href="#login" data-toggle="modal"
                                                        class="btn btn-login">Connexion</a></li>
                                <li class="nav-item"><a href="#register" data-toggle="modal"
                                                        class="btn btn-register">S'inscrire</a></li>
                            <?php } ?>


                        <?php } ?>
                        <?php if ($isConnected): ?>
                            <li class="nav-item"><a
                                        class="<?php if ($this->here == "/profile") { ?>active<?php } ?> nav-link js-scroll-trigger"
                                        href="<?= $this->Html->url(array('controller' => 'profile', 'action' => 'index', 'plugin' => null)) ?>">
                                    Mon profil </a></li>
                            <li class="nav-item"><a class=" nav-link js-scroll-trigger"
                                                    href="<?= $this->Html->url(array('controller' => 'user', 'action' => 'logout', 'plugin' => null)) ?>">
                                    Déconnection </a></li>
                            <?php if ($Permissions->can('ACCESS_DASHBOARD')): ?>
                                <li class="nav-item"><a class="nav-link js-scroll-trigger"
                                                        href="<?= $this->Html->url(array('controller' => '', 'action' => 'index', 'plugin' => 'admin')) ?>"><i
                                                class="fa fa-cogs"> </i>
                                        Admin
                                    </a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>

    </div>
</section>
<section id="slider"
         style="background: url(<?php if (empty($theme_config['slider'])) echo 'https://edensky.fr/img/uploads/banner_22_09_2020.webp'; else echo $theme_config['slider']; ?>) no-repeat;background-position: center; ">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 text-center" style="padding-top: 120px;">
                <img width="250px" style="z-index:10;position:relative;"
                     src="<?php if (empty($theme_config['logo'])) echo 'https://edensky.fr/img/uploads/theme_logo.png'; else echo $theme_config['logo']; ?>"/>
            </div>
        </div>
    </div>
</section>
