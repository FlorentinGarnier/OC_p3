
<div class="row">
    <div class="col-sm-3">
        <?php include_once 'adminMenu.html.php'?>
    </div>
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h3>Écrivez votre prochaine page!</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= isset($billet) ? $billet->getTitle() : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="illustration">Illustration</label>
                        <?php if (isset($billet) && $billet->getIllustration()) : ?>
                            <div class="img-thumbnail img-responsive bo__illustration"><img src="images/upload/<?= $billet->getIllustration() ?>" alt=""></div>
                        <?php endif ?>
                        <input type="file" name="illustration" id="illustration">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    </div>
                    <div class="form-group">
                        <label for="content">Corps</label>
                        <textarea class="write" name="content" id="content" cols="30" rows="10" ><?= isset($billet) ? $billet->getContent() : '' ?></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" content="Publier">
                </form>
            </div>
        </div>

    </div>
</div>
