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
     * @var Router
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