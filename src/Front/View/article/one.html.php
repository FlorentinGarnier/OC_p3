
    <div class="row">
        <div class="col-xs-12">
            <div class="starter-template">

               <h2><?= htmlspecialchars($billet->getTitle()) ?></h2>
                <em>Publié le <?= htmlspecialchars($billet->getCreatedAt()) ?></em>
                <p class="lead"><?= htmlspecialchars($billet->getContent()) ?></p>
            </div>
        </div>
    </div>

