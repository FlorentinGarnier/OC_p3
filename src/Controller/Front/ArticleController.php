<?php

namespace src\Controller\Front;

use app\Database;
use src\Model\Billet;

class ArticleController extends FrontController
{


    public function showAction()
    {
        $id = $this->getRequest()->getParam('id');

        if (empty($id)) {
            $this->router->redirect('article', 'index');
        }


        $billetEntity = new Billet(new Database());

        $billet = $billetEntity->getOne($id);


        return $this->sendView('../src/View/Front/index.html.php', [
            "billet" => $billet
        ]);
    }
}