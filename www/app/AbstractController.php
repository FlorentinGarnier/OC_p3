<?php

namespace app;


use app\Interfaces\ViewInterface;
use src\User\Model\UserModel;

abstract class AbstractController
{

    protected $request;
    protected $response;
    protected $router;
    protected $view;

    /**
     * @var UserModel
     */
    protected $user;

    public function __construct(Request $request, Response $response, Router $router, ViewInterface $view)
    {
        $this->request = $request;
        $this->response = $response;
        $this->router = $router;
        $this->view = $view;

        if (null !== $request->getSession('user')){
            $userEntity = new UserModel(new Database());
            $this->user = $userEntity->findOne($request->getSession('user')['id']);
        }

    }

    /**
     * @return mixed
     */
    protected function getRequest()
    {
        return $this->request;
    }

    /**
     * @param $view
     * @param array|null $params
     * @return Response
     */
    protected function render($view, $params = [])
    {

        $this->response->setContent($this->view->generate($view, $params));

        return $this->response;
    }


}