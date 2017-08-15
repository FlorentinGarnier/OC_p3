<div class="row">
    <div class="col-sm-3">
        <?php include_once 'adminMenu.html.php' ?>
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
                        <th>Signalé</th>
                        <th> </th>
                    </tr>
                    <?php if ($commentaries) : ?>
                    <?php foreach ($commentaries as $commentary) : ?>
                    <tr <?php if ($commentary->getSignalement()) {echo "class='danger'";} ?>>
                        <td><?= $commentary->getFirstname() ?> <?= $commentary->getLastname() ?></td>
                        <td><?= $commentary->getTitle() ?></td>
                        <td><?= $commentary->getComment() ?></td>
                        <td><em><?= $commentary->getCreatedAt() ?></em></td>
                        <td><?= $commentary->getSignalement() ?></td>
                        <td><a href="<?= $this->getUrl('admin', 'deleteCommentary', ['id' => $commentary->getId()]) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </div>
</div>
