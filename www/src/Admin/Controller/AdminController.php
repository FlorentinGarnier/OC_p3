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
    public function indexAction()
    {
        $commentaryModel = new CommentaryModel(new Database());
        $commentaries = $commentaryModel->findAll();

        return $this->render(':index', ['commentaries' => $commentaries]);
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