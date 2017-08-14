<div class="row">
    <div class="col-sm-3">
        <?php include_once 'adminMenu.html.php'?>
    </div>
    <div class="col-sm-9">
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" id="title" value="<?= isset($billet) ? $billet->getTitle() : '' ?>">
            </div>
            <div class="form-group">
                <label for="illustration">Illustration</label>
                <input type="file" name="illustration" id="illustration">
            </div>
            <div class="form-group">
                <label for="content">Corps</label>
                <textarea class="write" name="content" id="content" cols="30" rows="10" ><?= isset($billet) ? $billet->getContent() : '' ?></textarea>
            </div>
            <input type="submit" class="btn btn-success" content="Publier">
        </form>
    </div>
</div>
