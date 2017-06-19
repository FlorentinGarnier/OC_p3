<?php


namespace app;

/**
 * Class HTTPRequest
 * @package app
 */
class Application
{

    const __ROOT_DIR__ = __DIR__ . "/../";

    /**
     * @var $get array
     */
    private $query;
    private $uri;
    private $router;

    public function __construct(Router $router)
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->router = $router;
        $this->query = $this->hydrateQuery();
    }

    private function hydrateQuery()
    {

        $uri = substr($this->uri, 1);
        if ($uri) {
            $uri = explode('/', $uri);
            return $uri;
        } else return null;


    }

    /**
     * Lancement de l'application
     */
    public function start()
    {
        $this->router->get($this->query);
    }


}