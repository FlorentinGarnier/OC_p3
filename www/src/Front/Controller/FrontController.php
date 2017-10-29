<?php

namespace src\Front\Controller;

use app\AbstractController;
use app\Database;
use src\Front\Model\BilletModel;

abstract class FrontController extends AbstractController
{
    /**
     * @return \app\Response
     */
    public function indexAction()
    {

       $billetObj = new BilletModel(new Database());

        $billet = $billetObj->findAll("ORDER BY id DESC");

        return $this->render(':article:list',[
            'billets' => $billet
        ]);
    }
}