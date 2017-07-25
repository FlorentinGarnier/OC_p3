<?php

namespace app\Interfaces;

interface  ViewInterface
{

    /**
     * @param $view
     * @param array $param
     * @return
     * @Return string
     *
     * Generate view to send to the Response
     */
     function generate($view, $param = []);

    /**
     * Generate Url to controller in front
     *
     * @param $controller
     * @param $action
     * @param array $param
     */
    public function getUrl($controller, $action, $params = []);

}