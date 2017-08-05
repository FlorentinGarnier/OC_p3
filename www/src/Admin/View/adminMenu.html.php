<nav class="menu">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                Articles <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?= $this->getUrl('admin_article', 'list') ?>">Tous les articles</a></li>
                <li><a href="<?= $this->getUrl('admin_article', 'write') ?>">Écrire un article</a></li>
            </ul>
        </li>
        <li><a href="">Commentaires</a></li>
    </ul>
</nav>