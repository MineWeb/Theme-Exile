<section id="footer">
    <div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="title-footer">
					Liens
				</div>
                <div class="liens">
                    <?php if(!empty($nav)) {
                        $i = 0;
                        foreach ($nav as $key => $value) { ?>
                        <?php if($i <= 3) { ?>
                        <?php if(empty($value['Navbar']['submenu'])) { ?>
                                    <a class="lien-nav" href="<?= $value['Navbar']['url'] ?>" <?= ($value['Navbar']['open_new_tab']) ? ' target="_blank"' : '' ?>>
                                        <?= $value['Navbar']['name'] ?>
                                    </a>
                            <?php } ?>
                            <?php } else break; ?>
                        <?php $i++; }
                    } ?>
                </div>
			</div>
			<div class="col-md-4">
				<div class="title-footer">
					Contact
				</div>
                <div id="socials">
                    <a class="contact-link"><b>IP : </b><?= $theme_config['ip'] ?></a>
                    <?php
                        if (!empty($findSocialButtons)):
                            foreach ($findSocialButtons as $key => $value):
                    ?>
                    <?php
                            endforeach;
                        endif;
                    ?>
                    <?php
                        if(!empty($facebook_link)): ?>
                        <a class="contact-link"><b>Facebook : </b><?= $facebook_link ?></a>
                    <?php
                        endif;
                        if(!empty($twitter_link)):
                    ?>
                        <a class="contact-link"><b>Twitter : </b><?= $twitter_link ?></a>
                    <?php
                        endif;
                        if(!empty($youtube_link)):
                    ?>
                        <a class="contact-link"><b>Youtube : </b><?= $youtube_link ?></a>
                    <?php
                        endif;
                        if(!empty($skype_link)):
                    ?>
                        <a class="contact-link"><b>Skype : </b><?= $skype_link ?></a>
                    <?php
                        endif;
                    ?>
                </div>
			</div>
			<div class="col-md-4">
				<div class="title-footer">
					Informations
				</div>
				<div class="text-footer">
                    <?= $theme_config['footer_desc'] ?>
				</div>
			</div>
		</div>
    </div>
</section>
<section id="footer-by">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="title">
                    <a href="/"><?= $website_name ?></a> -
                    Thème créé par <a href="https://nivcoo.fr" target="_blank">nivcoo</a>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="title-2">
                    Propulsé par <a !important" href="http://mineweb.org" target="_BLANK">MineWeb</a>
                </div>
            </div>
        </div>
    </div>
</section>