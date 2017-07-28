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
                if (password_verify($this->getRequest()->getPost('password'), $userEntity->getPassword())){
                    setcookie('role', $userEntity->getRolesId(), time() + (7 * 24 * 60 * 60));
                    var_dump('hello');
                } else {
                    die('you should not pass');
                }
            };


        }
        return $this->render(':login');
    }
}