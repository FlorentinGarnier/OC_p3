<?php


namespace app;

/**
 * Class Application
 * @package app
 */
class Application
{

    const __ROOT_DIR__ = __DIR__ . "/../";

    /**
     * @var $get array
     */
    private $router;

    public function __construct(Router $router)
    {

        $this->router = $router;

    }



    /**
     * Lancement de l'application
     */
    public function start()
    {
        $this->router->get();
    }


}