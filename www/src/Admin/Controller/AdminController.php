<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 08/07/2017
 * Time: 16:39
 */

namespace src\Admin\Controller;


use app\AbstractController;
use app\Database;
use app\Request;
use src\Front\Model\CommentaryModel;

class AdminController extends AbstractController
{
    public function indexAction(Request $request)
    {
        try{
            if ($this->user->getRoles() === 'ADMIN' ||
                $this->user->getRoles() === 'SUPER_ADMIN') {
                $commentaryModel = new CommentaryModel(new Database());
                $commentaries = $commentaryModel->findAll("ORDER BY signalement DESC");

                return $this->render(':index', ['commentaries' => $commentaries]);
            } else {
                throw new \Exception("Accès refusés");
            }
        } catch (\Exception $exception) {
            $request->setSession('message', 'danger', '<strong>Erreur : </strong>' .$exception->getMessage());
            return $this->router->redirect('article', 'index');
        }

    }

    public function deleteCommentaryAction(Request $request)
    {
        $commentaryModel = new CommentaryModel(new Database());

        $commentary = $commentaryModel->findOne($request->getParam('id'));

        if ($this->user->getRoles() === 'ADMIN' ||
        $this->user->getRoles() === 'SUPER_ADMIN'){
            $commentary->delete();
        }


        return $this->router->redirect('admin', 'index');
    }



}