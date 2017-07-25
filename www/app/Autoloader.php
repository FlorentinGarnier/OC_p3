<?php

namespace app;

/**
 * Class Autoloader
 * @package app
 */
class Autoloader{

    const __ROOT_DIR__ = __DIR__ ."/../";


    /**
     *
     */
    static function register()
    {

        spl_autoload_register(function ($class) {

            $class = str_replace("\\", "/", $class);
            include self::__ROOT_DIR__ . $class . '.php';
        });
    }
}