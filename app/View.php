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

    const LAYOUT = __ROOT_DIR__ . 'app/Resources/Layout/index.html.php';
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

        require  self::LAYOUT;

    }


}