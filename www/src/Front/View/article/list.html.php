<div class="row">
    <?php $i = 0 ?>
    <?php foreach ($billets as $billet): ?>
    <div class="col-sm-4">
        <div class="card">
            <div class="card__face" style="background-image: url(images/upload/<?= $billet->getIllustration() ?>);">
                <a class="card__title" href="<?= $this->getUrl('article', 'show', ['id' => $billet->getId()]) ?>"><h4><?= $billet->getTitle() ?></h4></a>
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
