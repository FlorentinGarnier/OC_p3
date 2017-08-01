<?php




namespace src\User\Controller;


use app\AbstractController;
use app\Database;
use src\User\Model\UserModel;

class UserController extends AbstractController
{
    public function loginAction()
    {

        $request = $this->getRequest();

        if ($this->getRequest()->isPost()){

            $userEntity = new UserModel(new Database());

            $user = $userEntity->findUserByEmail($this->getRequest()->getPost('email'));


            if ($user) {
            var_dump($user);
                if (password_verify($this->getRequest()->getPost('password'), $user->getPassword())){

                    if ($request->getSession('user'))
                    {
                        unset($_SESSION['user']);
                    }
                    $request->setSession('user', 'id', $user->getId());

                    $this->router->redirect('article', 'index');
                } else {
                    $request->setSession('message', 'danger', 'Email ou mot de passe incorrecte');
                }
            }else {
                die('you should not pass');
            };





        }
        return $this->render(':login');
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        return $this->router->redirect('article', 'index');
    }

    public function registerAction()
    {
        $request = $this->getRequest();

        if ($request->isPost()){
            $userEntity = new UserModel(new Database());

            $userEntity->setFirstname($request->getPost('firstname'));
            $userEntity->setLastname($request->getPost('lastname'));
            $userEntity->setEmail($request->getPost('email'));

            //Check password
            if ($request->getPost('clearPassword') === $request->getPost('repeatClearPassword')){
                $userEntity->setPassword(password_hash($request->getPost('clearPassword'), PASSWORD_BCRYPT));
            } else {
                $request->setSession('message', 'danger', 'Les mots de passes ne correspondent pas');
                $this->router->redirect('user', 'register');

            }
            if ($userEntity->save($userEntity)){
                $request->setSession('message', 'success', '<strong>Félicitations</strong> votre compte a était créé.');

               return $this->router->redirect('article', 'index');
            }

            $request->setSession('message', 'danger', '<strong>Attention</strong> un compte avec cet email éxiste déjà');




        }
        return $this->render(':register');
    }
}