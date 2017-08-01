<?php

namespace src\Admin\Controller;

use app\AbstractController;
use app\Database;
use app\Request;
use src\Front\Model\BilletModel;

class BilletController extends AbstractController
{
    public function writeAction(Request $request)
    {
        if ($request->isPost()){
            $billet = new BilletModel(new Database());

            $billet
                ->setTitle($request->getPost('title'))
                ->setContent($request->getPost('content'))
                ->save($billet);

            $this->router->redirect('article', 'index');
        }
        return $this->render(':write');
    }
}