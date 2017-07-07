<?php

namespace app;

use src\Controller\Front\ArticleController;


class Router
{

    private $request;

    private $controller = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Response|void
     */
    public function get()
    {

        $controller = $this->request->getParam('controller');

        if (!empty($controller)) {

            //Récupère les pseudo route initialisé

            foreach ($this->controller as $controllerClass){

                if (class_exists($controllerClass)) {
                    $controllerInstance = new $controllerClass($this->request, new Response(), $this);

                    $action = $this->request->getParam('action');

                    if ($action && method_exists($controllerInstance, strtolower($action) . 'Action')) {
                        return $controllerInstance->{$action . 'Action'}();
                    } else return $controllerInstance->indexAction();


                } else {
                    return header("HTTP/1.0 404 Not Found");
                }

            }



        } else {
            $controller = new ArticleController($this->request, new Response(), $this);

            return $controller->indexAction();
        }

    }


    /**
     * @param $controller
     *
     * Redirect to another controller
     * @return Response
     */
    public function redirect($controller, $action)
    {
        $controller = $this->controller[$controller];
        $Controller = new $controller($this->request, new Response(), $this);

        return $Controller->{$action.'Action'}();
    }

    /**
     * @param $param
     * @param $controller
     *
     * Collection of application pseudo route.
     */
    public function add($param, $controller)
    {
        $this->controller[$param] = $controller;
    }


}