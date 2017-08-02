<?php

namespace src\Front\Controller;

use app\Database;
use app\Request;
use src\Front\Model\BilletModel;

class ArticleController extends FrontController
{


    public function showAction(Request $request)
    {

        $id = $request->getParam('id');

        if (empty($id)) {
            $this->router->redirect('article', 'index');
        }


        $billetEntity = new BilletModel(new Database());

        $billet = $billetEntity->findOne($id);

        return $this->render(':article:one',[
            "billet" => $billet
        ]);
    }
}