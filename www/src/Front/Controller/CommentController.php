<?php

namespace src\Front\Controller;

use app\AbstractController;
use app\Database;
use app\Request;
use src\Front\Model\CommentaryModel;

class CommentController extends AbstractController
{
    public function signalAction(Request $request)
    {
        try{
            if ($request->getParam('id')){

                $commentaryModel = new CommentaryModel(new Database());
                $comment = $commentaryModel->findOne($request->getParam('id'));
                $comment->setSignalement($comment->getSignalement() + 1);
                $comment->save($comment);

            } else {
                throw new \Exception("Ce commentaire n'éxiste pas");
            }
        } catch (\Exception $exception){
            $request->setSession('message', 'danger', $exception->getMessage());
            $this->router->redirect('article', 'index', null,303);
        }

        $request->setSession('message', 'success', 'Le commentaire a bien était signalé, merci');
        $this->router->redirect('article', 'index', null, 303);
    }
}