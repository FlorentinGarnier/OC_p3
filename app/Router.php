<?php

namespace app;

use src\Controller\FrontController;

class Router
{
    public function get($query)
    {

        $frontController = new FrontController();

        if ($query)
        {
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