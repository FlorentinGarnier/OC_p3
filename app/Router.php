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
            var_dump($query);
            echo 'hello';
        } else {
            return $frontController->indexAction();
        }

    }
}