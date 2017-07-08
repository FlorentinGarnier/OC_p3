<?php

namespace app;

use src\Front\View\ViewInterface;

abstract class AbstractController
{

    protected $request;
    protected $response;
    protected $router;
    protected $view;

    public function __construct(Request $request, Response $response, Router $router, \app\Interfaces\ViewInterface $view)
    {
        $this->request = $request;
        $this->response = $response;
        $this->router = $router;
        $this->view = $view;

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
    protected function sendView($params = [])
    {

        $this->response->setContent($this->view->generate($params));

        return $this->response;
    }


}