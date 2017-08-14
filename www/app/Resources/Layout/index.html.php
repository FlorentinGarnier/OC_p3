<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jean Forteroche | Billet simple pour l'Alaska</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" href="/assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '.write'
        });
    </script>

</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($user) && $user) : ?>
                <li><a href="">Bienvenue <?= $user->getFirstname() ?></a></li>
                <?php if ($user->getRoles() == 'SUPER_ADMIN' ||
                    $user->getRoles() == 'ADMIN'
                ) : ?>
                    <li><a href="<?= $this->getUrl('admin', 'index') ?>">Administration</a></li>
                <?php endif ?>
                <li><a href="<?= $this->getUrl('user', 'logout') ?>">Se déconnecter</a></li>
            <?php else : ?>

                <li><a href="<?= $this->getUrl('user', 'login') ?>">Connexion</a></li>
                <li><a href="<?= $this->getUrl('user', 'register') ?>">Créer un compte</a></li>

            <?php endif ?>
        </ul>
    </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid ">
    <div class="row">
        <div class="hero">
            <h1 data-content="Jean Forteroche">
                Jean Forteroche
            </h1>
            <h2 data-content="Billet simple pour l'Alaska">
                Billet simple pour l'Alaska
            </h2>
        </div>


    </div>
</div>


<div class="container">

    <?php if (isset($_SESSION['message'])) : ?>
        <?php foreach ($_SESSION['message'] as $k => $item) : ?>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <div class="alert alert-<?= $k ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <?= $item ?>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
        <?php unset($_SESSION['message']); ?>


    <?php endif ?>

    <?= $content ?>


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/js/main.js"></script>

</body>
</html>

