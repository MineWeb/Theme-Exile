<section class="content">
    <form method="post" enctype="multipart/form-data" data-ajax="false">
        <div class="card">
            <div class="card-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link text-dark active" href="#config-accueil"
                                                data-toggle="tab">Accueil</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" style="cursor:pointer" class="nav-link text-dark js-scroll-trigger"
                               data-toggle="dropdown"
                               role="button"
                               aria-expanded="false">Plugins <i class="fa fa-angle-down"></i></a>
                            <ul style="text-align: left;padding: 0px;" class="dropdown-menu"
                                role="menu">
                                <a class="dropdown-item" href="#config-votes" data-toggle="tab">Votes</a>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding: 15px;">
                        <div class="tab-pane fade show active" id="config-accueil">
                            <div class="row">

                                <div class="col-md-12 form-group">
                                    <div class="form-group">
                                        <label>Url de la Bannière</label>
                                        <input type="text" value="<?= $config['slider'] ?>"
                                               placeholder="slider" class="form-control"
                                               name="slider" cols="30" rows="10">
                                    </div>
                                    <div class="form-group">
                                        <label>Ip du Serveur</label>
                                        <p>Entrez l'ip du Serveur</p>
                                        <input type="text" value="<?= $config['ip'] ?>"
                                               placeholder="IP" class="form-control"
                                               name="ip">
                                    </div>
                                    <div class="form-group">
                                        <label>Ip du logo</label>
                                        <p>Entrez l'url du logo</p>
                                        <input type="text" value="<?= $config['logo_url'] ?>"
                                               placeholder="Logo url" class="form-control"
                                               name="logo_url"">
                                    </div>

                                    <div class="form-group">
                                        <label>Information du Footer</label>
                                        <p>Entrez le texte affiché dans le footer</p>
                                        <input type="text" value="<?= $config['footer_desc'] ?>"
                                               placeholder="information" class="form-control"
                                               name="footer_desc">
                                    </div>


                                    <div class="form-group">
                                        <label>Identifiant du Trailer youtube</label>
                                        <p>Exemple : z8TTE3ZgNBg</p>
                                        <input type="text" value="<?= $config['trailer_id'] ?>"
                                               placeholder="Identifiant du Trailer" class="form-control"
                                               name="trailer_id">
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success"
                                            type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="config-votes">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Votes</label>
                                        <p>Editez les récompenses affichées des 3 premiers top voteurs.</p>
                                        <div class="form-group">
                                            <label>Récompense 1</label>
                                            <input type="text" class="form-control" name="votes[un]"
                                                   placeholder="Titre"
                                                   value="<?= $config['votes']->un ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Récompense 2</label>
                                            <input type="text" class="form-control" name="votes[deux]"
                                                   placeholder="Titre" value="<?= $config['votes']->deux ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Récompense 3</label>
                                            <input type="text" class="form-control" name="votes[trois]"
                                                   placeholder="Titre" value="<?= $config['votes']->trois ?>">
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <hr>
                                    <input name="data[_Token][key]" value="<?= $csrfToken ?>" type="hidden">
                                    <button class="btn btn-success" type="submit"><?= $Lang->
                                        get('GLOBAL__SUBMIT') ?>
                                    </button>
                                    <a href="<?= $this->Html->url(array('controller' => 'theme', 'action' => 'index', 'admin' => true)) ?>"
                                       type="button"
                                       class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
