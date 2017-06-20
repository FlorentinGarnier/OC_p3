<?php

namespace src\Controller;

class FrontController
{
    public function indexAction()
    {
        require  __DIR__.'/../View/front/index.html.php';
    }

    public function articleAction($id)
    {
        var_dump($id);

        echo sprintf("Afficher l'article %d", $id);
    }
}