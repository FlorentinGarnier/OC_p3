<?php

namespace app;

use src\Controller\FrontController;

class Router
{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get()
    {

        $frontController = new FrontController();


        if ($this->request->getParam('url'))
        {
            var_dump($this->request->getParam('url'));

            switch ($query[0]){
                case 'article':
                    return $frontController->articleAction($query[1]);
                    break;
                default :
                    header("HTTP/1.0 404 Not Found");
            }


        } else {
            return $frontController->indexAction();
        }

    }
}