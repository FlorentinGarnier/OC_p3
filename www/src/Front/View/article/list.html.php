<?php foreach ($billets as $billet): ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="starter-template">

                <a href="<?= $this->getUrl('article', 'show', ['id' => $billet->getId()]) ?>"><h2><?= htmlspecialchars($billet->getTitle()) ?></h2></a>
                <em>Publié le <?= htmlspecialchars($billet->getCreatedAt()) ?></em>
                <p class="lead"><?= htmlspecialchars($billet->getContent()) ?></p>
            </div>
        </div>
    </div>

<?php endforeach; ?>