<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=0.8, user-scalable=yes">
	<meta name="author" content="nivcoo,Eywek">

    <title><?= $seo_config['title'] ?></title>
    <link rel="icon" type="image/png" href="<?= $seo_config['favicon_url'] ?>"/>
    <meta name="title" content="<?= $seo_config['title'] ?>">
    <meta property="og:title" content="<?= $seo_config['title'] ?>">
    <meta name="description" content="<?= $seo_config['description'] ?>">
    <meta property="og:description" content="<?= $seo_config['description'] ?>">
    <meta property="og:image" content="<?= $seo_config['img_url'] ?>">
	<!-- CSS -->
	<?= $this->Html->css('global.css') ?>
	<?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'); ?>
    <?= $this->Html->css('https://use.fontawesome.com/releases/v5.9.0/css/all.css'); ?>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap" rel="stylesheet">

	<!-- JavaScript -->
	<?= $this->Html->script('jquery-1.11.0.js') ?>
	<?= $this->Html->script('bootstrap.min.js') ?>
	<?= $this->Html->script('jquery.cookie.js') ?>
    <style>
        @-moz-keyframes FADE{
            0%{
                opacity: 0;
            }
            100% {
                opacity: 1;/
            }
        }
        @-webkit-keyframes FADE{
            0%{
                opacity: 0;
            }
            100% {
                opacity: 1;

            }
        }
        body{
            -webkit-animation-name:FADE;
            -webkit-animation-duration:1s;
            -webkit-animation-iteration-count:1;
            -moz-animation-name: FADE;
            -moz-animation-duration: 1s;
        }

    </style>
	
</head>
<body>
<?= $this->element('modals') ?>
<?= $this->element('navbar') ?>
<?= $this->fetch('content'); ?>

<?= $this->element('footer') ?>
<?= $this->Html->script('app.js') ?>
<?= $this->Html->script('form.js') ?>
<?= $this->Html->script('notification.js') ?>
<script>
    <?php if($isConnected) { ?>
        var notification = new $.Notification({
            'url': {
                'get': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'getAll')) ?>',
                'clear': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clear', 'NOTIF_ID')) ?>',
                'clearAll': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'clearAll')) ?>',
                'markAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAsSeen', 'NOTIF_ID')) ?>',
                'markAllAsSeen': '<?= $this->Html->url(array('plugin' => false, 'controller' => 'notifications', 'action' => 'markAllAsSeen')) ?>'
            },
            'messages': {
                'markAsSeen': '<?= $Lang->get('NOTIFICATION__MARK_AS_SEEN') ?>',
                'notifiedBy': '<?= $Lang->get('NOTIFICATION__NOTIFIED_BY') ?>'
            }
        });
    <?php } ?>
    var LIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'like')) ?>";
    var DISLIKE_URL = "<?= $this->Html->url(array('controller' => 'news', 'action' => 'dislike')) ?>";

    var LOADING_MSG = "<?= $Lang->get('GLOBAL__LOADING') ?>";
    var ERROR_MSG = "<?= $Lang->get('GLOBAL__ERROR') ?>";
    var INTERNAL_ERROR_MSG = "<?= $Lang->get('ERROR__INTERNAL_ERROR') ?>";
    var FORBIDDEN_ERROR_MSG = "<?= $Lang->get('ERROR__FORBIDDEN') ?>"
    var SUCCESS_MSG = "<?= $Lang->get('GLOBAL__SUCCESS') ?>";

    var CSRF_TOKEN = "<?= $csrfToken ?>";
</script>
<?php if(isset($google_analytics) && !empty($google_analytics)) { ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?= $google_analytics ?>', 'auto');
    ga('send', 'pageview');
</script>


<?php } ?>
<?= $configuration_end_code ?>
</body>
</html>

