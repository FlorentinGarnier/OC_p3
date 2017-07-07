<?php

namespace src\Front\Controller;

use app\AbstractController;
use app\Database;
use src\Front\Model\Billet;

abstract class FrontController extends AbstractController
{
    /**
     * @return \app\Response
     */
    public function indexAction()
    {

       $billetObj = new Billet(new Database());

        $billet = $billetObj->getAll();

        return $this->sendView('../src/Front/View/index.html.php', [
            'billet' => $billet
        ]);
    }
}