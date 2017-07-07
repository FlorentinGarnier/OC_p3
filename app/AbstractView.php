<?php

namespace app;

abstract class AbstractView
{

    public function __construct()
    {

    }

    /**
     * @param $view
     * @param array $param
     */
    public function generate($view, $param = [])
   {

       require $view;
   }
}