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
                Vote
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
<div class="ab-content" id="vote">
	<div class="step active" id="step-1">
		<div class="vote-up">
			<div class="container">
				<div class="row">
					<div class="col-md-4 offset-sm-4">
						<div class="subtitle">
						Entrez votre pseudo
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 offset-sm-4">
            <div class="vote-dialog">
                <form data-ajax="true" action="<?= $this->Html->url(['action' => 'setUser']) ?>" method="post"
                      data-callback-function="afterSetUser">
                    <div class="vote-form" style="width: 350px;display: inline-block;">
                        <div class="ajax-msg"></div>
                        <input type="text" class="form-control" name="username"
                               placeholder="Votre pseudo" <?= ($user) ? 'value="' . $user['pseudo'] . '" disabled' : '' ?>>
                    </div>
                    <br>
                    <br>
                    <button class="btn btn-vote-1" type="submit">Passer a l'étape suivante</button>
                </form>
            </div>
		</div>

	</div>
	<div class="step" id="step-2">
		<div class="vote-up">
			<div class="container">
				<div class="row">
					<div class="col-md-4 offset-sm-4">
						<div class="subtitle">
						Choisissez votre site de vote
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 setup-content text-center">
			<div class="loader text-center">
				<p>
					<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
				</p>
			</div>

			<div id="website-error"></div>
			<div class="row">
				<div class="col-md-4 " style="float: none;margin: 0 auto;">
                    <?php foreach ($websitesByServers as $serverName => $websites) { ?>
                        <div class="vote-dialog">
                            <div class="vote-header">
                                <a><?= $serverName; ?></a><br>
                            </div>
                            
                            <div class="vote-body" style="padding:20px;">
                                <?php foreach ($websites as $website) { ?>
                                <a data-website-id="<?= $website['Website']['id'] ?>"
                                   href="<?= $website['Website']['url'] ?>" target="_blank"
                                   class="btn btn-vote-2 website"><?= $website['Website']['name'] ?></a>
                                <?php } ?>
                            </div>
                            
                        </div>
                    <?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="step" id="step-3">
		<div class="vote-up">
			<div class="container">
				<div class="row">
					<div class="col-md-4 offset-sm-4">
						<div class="subtitle">
						Connectez-vous et récupérér votre récompense
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 setup-content text-center">
			<div class="row">
				<div class="col-md-4 offset-sm-4">
                    <div class="vote-dialog" style="padding:20px;">
                        <div id="reward-msg"></div>
                        <button class="btn btn-info btn-vote-2 get-reward" data-reward="now"><?= $Lang->get('VOTE__GET_REWARD_NOW') ?>
                        </button>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>


<br>
<div class="container" id="vote">
	<div class="row">
		<div class="col-md-12">

			<div class="vote-dialog">

				<h2 class="text-center vote-header" style="font-family: 'Concert One', sans-serif;margin-bottom:20px">
					<i class="fa fa-table"></i>
					Classement
				</h2>

				<div class="table-responsive vote-body text-left">
					<table class="table text-muted">
						<tbody>
						<?php
                        $i = 0;
                        foreach ($users as $user) {
                            ++$i;
                            echo '<tr>';
                            echo "<td style='width:300px;'>#$i";
                            if ($i === 1)
                                echo '&nbsp;<i style="color:rgb(255, 215, 0);" class="fa fa-trophy"> '.$theme_config['votes']->un.'</i>';
                            else if ($i === 2)
                                echo '&nbsp;<i style="color:rgb(192, 192, 192);" class="fa fa-trophy"> '.$theme_config['votes']->deux.'</i>';
                            else if ($i === 3)
                                echo '&nbsp;<i style="color:rgb(176, 0, 14);" class="fa fa-trophy"> '.$theme_config['votes']->trois.'</i>';
                            echo "</td>";
                            echo "<td><img src='{$this->Html->url(['controller' => 'API', 'action' => 'get_head_skin', 'plugin' => false, $user['username'], 25])}' style='margin-right:10px;' class='img-rounded' alt=''> &nbsp;{$user['username']}</td>";
                            echo "<td>{$user['count']} " . strtolower($Lang->get('VOTE__TITLE_ACTION')) . "</td>";
                            echo '</tr>';
                        }
                        ?>
						</tbody>
					</table>
				</div>

			</div>

		</div>

	</div>
</div>

<style>

	.well {
		background: #fff;
	}

	.step:not(.active) {
		display: none;
	}

	.loader {
		display: none;
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		background: rgba(156, 156, 156, 0.55);
		z-index: 9;
		cursor: wait;
	}

	.loader p {
		position: absolute;
		top: 45%;
		left: 47.8%;
		color: #fff;
	}
</style>
<script type="text/javascript">
    function afterSetUser(req, res)
    {
        next(2)
    }

    function next(step)
    {
        $('#step-' + (step - 1).toString()).removeClass('active')
        $('#step-' + step.toString()).addClass('active')
        $('a[href="#step-' + (step - 1).toString() + '"]').parent().removeClass('active')
        $('a[href="#step-' + step.toString() + '"]').parent().addClass('active').removeClass('disabled')
    }

    $('.website').on('click', function (e) {
        e.preventDefault()
        website = $(this)
        $('.loader').css('display', 'block')
        $.post('<?= $this->Html->url(['action' => 'setWebsite']) ?>', {'data[_Token][key]': '<?= $csrfToken ?>', 'website_id': $(this).attr('data-website-id')}, function (data) {
            if (data.status) {
                if (!window.open(data.data.website.url, '_blank')) {
                    $('#voteBtn').attr('href', data.data.website.url)
                    $('#redirectModal').modal({backdrop: 'static', keyboard: false})
                } else {
                    startTimerCheckVote()
                }
            } else {
                $('#website-error').html('<div class="alert alert-danger"><b><?= $Lang->get('GLOBAL__ERROR') ?>:</b> ' + data.error + '</div>')
                $('.loader').css('display', 'none')
            }
        }).fail(function () {
            $('#website-error').html('<div class="alert alert-danger"><b><?= $Lang->get('GLOBAL__ERROR') ?>:</b> <?= $Lang->get('VOTE__ERROR_WEBSITE') ?></div>')
            $('.loader').css('display', 'none')
        })
    })

    function startTimerCheckVote()
    {
        setTimeout(checkVote, 10000);
    }
    function checkVote()
    {
        $.get('<?= $this->Html->url(['action' => 'checkVote']) ?>', function (data) {
            if (data.status) {
                if (!data.reward_later)
                    $('.get-reward[data-reward="later"]').remove()
                next(3)
            } else
                setTimeout(checkVote, 2500);
        }).fail(function () {
            setTimeout(checkVote, 2500);
        })
    }

    $('.get-reward').on('click', function (e) {
        var btn = $(this)
        var type = btn.attr('data-reward')
        $('.get-reward').addClass('disabled')
        $.post('<?= $this->Html->url(['action' => 'getReward']) ?>', {'data[_Token][key]': '<?= $csrfToken ?>', 'reward_time': type.toUpperCase()}, function (data) {
            if (data.status) {
                $('#reward-msg').html('<div class="alert alert-success"><b><?= $Lang->get('GLOBAL__SUCCESS') ?>:</b> ' + data.success + '</div>')
            } else if (!data.status) {
                $('.get-reward').removeClass('disabled')
                $('#reward-msg').html('<div class="alert alert-danger"><b><?= $Lang->get('GLOBAL__ERROR') ?>:</b> ' + data.error + '</div>')
            } else {
                $('.get-reward').removeClass('disabled')
                $('#reward-msg').html('<div class="alert alert-danger"><b><?= $Lang->get('GLOBAL__ERROR') ?>:</b> ' + data.msg + '</div>')
            }
        }).fail(function () {
            $('.get-reward').removeClass('disabled')
            $('#reward-msg').html('<div class="alert alert-danger"><b><?= $Lang->get('GLOBAL__ERROR') ?>:</b> <?= $Lang->get('VOTE__ERROR_REWARD') ?></div>')
        })
    })
</script>
<div style="font-family: 'Concert One', sans-serif;margin-top:10pc" class="modal fade" id="redirectModal" tabindex="-1"
	 role="dialog">
	<div class="modal-dialog modal-lg">
		<div style="background-color:transparent;color:white;border:none" class="modal-content">
			<div class="modal-body text-center">
				<div class="alert alert-info"><?= $Lang->get('VOTE__MODAL_DESC') ?></div>
				<a href="#" id="voteBtn" target="_blank"
				   onclick="$('#redirectModal').modal('hide');startTimerCheckVote()"
				   class="btn btn-info btn-block"><?= $Lang->get('VOTE__MODAL_BTN') ?></a>
			</div>
		</div>
	</div>
</div>
