
    <div class="row">
        <div class="col-xs-12">
            <div class="starter-template">

               <h2><?= $billet->getTitle() ?></h2>
                <em>Publié le <?= $billet->getCreatedAt() ?></em>
                <p class="lead"><?= $billet->getContent() ?></p>
                <hr>
            </div>
        </div>
    </div>
    <?php if (isset($comments)) : ?>
        <?php foreach ($comments as $comment) : ?>
        <div class="row">
            <div class="col-xs-12">
                <h4><?= $comment->getFirstname() . ' ' . $comment->getLastname() ?></h4>
                <em>Le <?= date( "d-m-Y à H:i",strtotime($comment->getCreatedAt())) ?></em>
                <p><?= $comment->getComment() ?></p>
            </div>
        </div>
            <?php endforeach ?>
    <?php endif ?>
    <div class="row">
        <div class="col-xs-12">
            <form action="#" method="post">
                <div class="form-group">
                    <label hidden for="comment">Commentaire</label>
                    <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" placeholder="Mon commentaire..."></textarea>
                </div>
                <button class="btn btn-info" type="submit">Envoyer</button>
            </form>
        </div>
    </div>

