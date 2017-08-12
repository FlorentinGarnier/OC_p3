<?php




namespace src\User\Controller;


use app\AbstractController;
use app\Database;
use app\Request;
use src\User\Model\UserModel;

class UserController extends AbstractController
{
    public function loginAction(Request $request)
    {           // $request = $this->getRequest();

        try{

            if ($this->getRequest()->isPost()){

                $userEntity = new UserModel(new Database());

                $user = $userEntity->findUserByEmail($this->getRequest()->getPost('email'));


                if ($user) {
                    if (password_verify($this->getRequest()->getPost('password'), $user->getPassword())){

                        if ($request->getSession('user'))
                        {
                            unset($_SESSION['user']);
                        }
                        $request->setSession('user', 'id', $user->getId());

                        return $this->router->redirect('article', 'index');
                    } else {
                        $request->setSession('message', 'danger', 'Email ou mot de passe incorrecte');
                    }
                }else {

                    $request->setSession('message', 'danger', 'Utilisateur inconnu');
                }


            }
            return $this->render(':login');
        } catch (\Exception $exception)
        {
            $request->setSession('message', 'danger', 'Une erreur est survenue');
            return $this->router->redirect('article', 'index');

        }

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