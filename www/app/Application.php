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

    /**
     * @var Response
     */
    private $taxiway;

    public function __construct(Router $router)
    {

        $this->router = $router;

    }



    /**
     * Lancement de l'application
     */
    public function start()
    {
        session_start();

        $this->taxiway = $this->router->get();
    }


    public function sendResponse()
    {
        $this->taxiway->takeOff();
    }

}