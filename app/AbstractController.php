<?php

namespace app;

use src\View\View;

abstract class AbstractController
{

    protected $request;
    protected $response;
    protected $router;

    public function __construct(Request $request, Response $response, Router $router)
    {
        $this->request = $request;
        $this->response = $response;
        $this->router = $router;

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
    protected function sendView($view, $params = [] )
    {


        $viewInstance = new View();

        $this->response->setContent($viewInstance->generate($view, $params));

        return $this->response;
    }


}