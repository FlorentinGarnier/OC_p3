
    <div class="row">
        <div class="col-xs-12">
            <div class="starter-template">

               <h2><?= $billet->getTitle() ?></h2>
                <em>Publié le <?= $billet->getCreatedAt() ?></em>
                <p class="lead"><?= $billet->getContent() ?></p>
            </div>
        </div>
    </div>

