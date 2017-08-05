
    <div class="row">
        <div class="col-xs-12">
            <div class="starter-template">

               <h2><?= $billet->getTitle() ?></h2>
                <em>Publié le <?= $billet->getCreatedAt() ?></em>
                <p class="lead"><?= $billet->getContent() ?></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form action="#" method="post">
                <div class="form-group">
                    <label hidden for="post_<?= $billet->getId() ?>">Commentaire</label>
                    <textarea class="form-control" name="post_<?= $billet->getId() ?>" id="post_<?= $billet->getId() ?>" cols="30" rows="10" placeholder="Mon commentaire..."></textarea>
                </div>
                <button class="btn btn-info" type="submit">Envoyer</button>
            </form>
        </div>
    </div>

