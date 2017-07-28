<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 01/07/2017
 * Time: 15:06
 */

namespace app;


use app\Interfaces\ViewInterface;

class View implements ViewInterface
{

    const _LAYOUT_ = __ROOT_DIR__ . 'app/Resources/Layout/index.html.php';
    private $viewPath;

    public function __construct($viewPath)
    {
        $this->viewPath = $viewPath. '/../View/';
    }


    /**
     * @param array $param
     * @return string
     * @internal param $view
     */
    public function generate($view, $param = [])
    {



        extract($param);

        ob_start();

        require $this->viewPath . str_replace(':', '/', $view) . '.html.php';

        $content = ob_get_clean();

        require  self::_LAYOUT_;

    }

    /**
     * Generate Url to controller in front
     *
     * @param $controller
     * @param $action
     * @param array $param
     */
    public function getUrl($controller, $action, $params = [])
    {
        $results = null;
        if ($params){
            foreach ($params as $k => $param){

                $results .= '&' .$k . '=' .$param;
            }
        }

        echo 'http://'. $_SERVER['SERVER_NAME'] . '/index.php?controller='. $controller .'&action='. $action . $results ;
    }


}