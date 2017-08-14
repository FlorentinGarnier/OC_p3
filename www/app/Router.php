<?php

namespace app;



class Router
{

    private $request;

    private $controller = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     *
     */
    public function get()
    {

        $controller = $this->request->getParam('controller');

        if (!empty($controller)) {


                if (class_exists($this->controller[$controller])) {


                    $controllerInstance = new $this->controller[$controller](
                        $this->request,
                        new Response(),
                        $this,
                        new View(dirname((new \ReflectionClass($this->controller[$controller]))->getFileName()))
                    );
                    $action = $this->request->getParam('action');

                    if ($action && method_exists($controllerInstance, strtolower($action) . 'Action')) {

                        return $controllerInstance->{$action . 'Action'}($this->request);
                    } else return header("HTTP/1.0 404 Not Found");


                } else {
                    return header("HTTP/1.0 404 Not Found");
                }





        } else {
           return $this->redirect('article', 'index');
        }

    }


    /**
     * @param $controller
     *
     * Redirect to another controller
     * @param $action
     * @param array $param
     * @return Response
     */
    public function redirect($controller, $action, $param = [], $code = 200)
    {
        /*$controller = $this->controller[$controller];
        $Controller = new $controller($this->request, new Response(), $this, new View(dirname((new \ReflectionClass($controller))->getFileName())));

        return $Controller->{$action.'Action'}($this->request, $param);*/

        header('HTTP/1.0 ' . $code);
        header("Location: ". $this->getUrl($controller, $action, $param) );

        exit;

    }

    /**
     * Generate Url to controller in front
     *
     * @param $controller
     * @param $action
     * @param array $param
     * @return string
     */
    public function getUrl($controller, $action, $params = [])
    {
        $results = null;
        if ($params){
            foreach ($params as $k => $param){

                $results .= '&' .$k . '=' .$param;
            }
        }

        return 'http://'. $_SERVER['SERVER_NAME'] . '/index.php?controller='. $controller .'&action='. $action . $results ;
    }


    /**
     * @param $param
     * @param $controller
     *
     * Collect application pseudo route.
     */
    public function add($param, $controller)
    {
        $this->controller[$param] = $controller;
    }


}