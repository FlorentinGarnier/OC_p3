<?php

namespace app\Interfaces;

interface  ViewInterface
{

    /**
     * @param array $param
     * @Return string
     *
     * Generate view to send to the Response
     *
     */
     function generate($param = []);

}