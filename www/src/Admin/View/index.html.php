<div class="row">
    <div class="col-sm-3">
        <nav class="menu">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="<?= $this->getUrl('admin_article', 'write') ?>">Écrire un article</a></li>
                <li><a href="">Commentaires</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <h2>Vos derniers commentaires</h2>
                    <tr>
                        <th>Auteur</th>
                        <th>Article</th>
                        <th>Commentaire</th>
                        <th>Date et heure</th>
                        <th> </th>
                    </tr>
                    <?php if ($commentaries) : ?>
                    <?php foreach ($commentaries as $commentary) : ?>
                    <tr>
                        <td><?= $commentary->getFirstname() ?> <?= $commentary->getLastname() ?></td>
                        <td><?= $commentary->getTitle() ?></td>
                        <td><?= $commentary->getComment() ?></td>
                        <td><em><?= $commentary->getCreatedAt() ?></em></td>
                        <td><a href="<?= $this->getUrl('admin', 'deleteCommentary', ['id' => $commentary->getId()]) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </div>
</div>
