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
        $this->setRouter($router);

    }

    /**
     * @return array
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param  Router $router
     */
    public function setRouter($router)
    {
        $this->router = $router;
    }

    /**
     * @return Response
     */
    public function getTaxiway()
    {
        return $this->taxiway;
    }

    /**
     * @param Response $taxiway
     */
    public function setTaxiway($taxiway)
    {
        $this->taxiway = $taxiway;
    }




    /**
     * Lancement de l'application
     */
    public function start()
    {


        $this->taxiway = $this->router->get();
    }


    public function sendResponse()
    {
        $this->taxiway->takeOff();
    }

}