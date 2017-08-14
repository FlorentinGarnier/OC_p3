<div class="row">
    <?php $i = 0 ?>
    <?php foreach ($billets as $billet): ?>
    <div class="col-xs-4">
        <div class="panel panel-default">
            <div class="panel-heading card card-face">
                <a href="<?= $this->getUrl('article', 'show', ['id' => $billet->getId()]) ?>"><h2><?= $billet->getTitle() ?></h2></a>
            </div>
            <div class="panel-body card-back">

                <em>Publié le <?= $billet->getCreatedAt() ?></em>
                <p class="lead"><?= $billet->getContent() ?></p>
            </div>
        </div>
    </div>
    <?php $i++ ?>
    <?php if ($i % 3 === 0) : ?>
</div>
<div class="row">
    <?php endif ?>
    <?php endforeach; ?>
</div>
