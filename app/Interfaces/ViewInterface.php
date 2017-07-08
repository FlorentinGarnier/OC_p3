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

}