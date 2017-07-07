<?php

namespace src\Controller\Front;

use app\AbstractController;
use app\Database;
use src\Model\Billet;

abstract class FrontController extends AbstractController
{
    /**
     * @return \app\Response
     */
    public function indexAction()
    {

       $billetObj = new Billet(new Database());

        $billet = $billetObj->getAll();

        return $this->sendView('../src/View/Front/index.html.php', [
            'billet' => $billet
        ]);
    }
}