<?php


namespace src\User\Controller;


use app\AbstractController;
use app\Database;
use src\User\Model\UserModel;

class UserController extends AbstractController
{
    public function loginAction()
    {

        if ($this->getRequest()->getPost()) {

            $userEntity = new UserModel(new Database());


            if (!$userEntity->getUserByUsername($this->getRequest()->getPost('username'))) {
                die ('You should not pass');
            };


        }
        return $this->render(':login');
    }
}