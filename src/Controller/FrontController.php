<?php

namespace src\Controller;

class FrontController
{
    public function indexAction()
    {
        return print_r("Bienvenue dans la page d'accueil");
    }

    public function articleAction($id)
    {
        return print_r("Afficher l'article %d",$id);
    }
}