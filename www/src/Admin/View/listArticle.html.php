<div class="row">
    <div class="col-sm-3">
        <?php include_once 'adminMenu.html.php' ?>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12">
                <table class="table">
                    <h2>Vos articles</h2>
                    <tr>
                        <th>Titre</th>
                        <th>Publié le :</th>
                        <th>Mis à jour le :</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php if ($billets) : ?>
                        <?php foreach ($billets as $billet) : ?>
                            <tr>
                                <td><?= $billet->getTitle() ?></td>
                                <td><em><?= $billet->getCreatedAt() ?></em></td>
                                <td><em><?= $billet->getUpdatedAt() ?></em></td>
                                <td><a href="<?= $this->getUrl('admin_article', 'update', ['id' => $billet->getId()]) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                <td><a href="<?= $this->getUrl('admin_article', 'delete', ['id' => $billet->getId()]) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif ?>
                </table>
            </div>
        </div>
    </div>
</div>