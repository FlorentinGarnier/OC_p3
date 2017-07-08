<?php
/**
 * Created by PhpStorm.
 * User: florentingarnier
 * Date: 01/07/2017
 * Time: 15:06
 */

namespace src\Front\View;


use app\Interfaces\ViewInterface;

class View implements ViewInterface
{
    /**
     * @param array $param
     * @return string
     * @internal param $view
     */
    public function generate($param = [])
    {
        $data = [];
        $views = ['content' => 'article/list.html.php'];
        foreach ($views as $k => $item) {
            $data[$k] = $this->makeView($item, $param);
        }

        var_dump($data);

        return $this->makeView('index.html.php', $data);

    }



    protected function makeView($file, $params = [])
    {

        extract($params);
        ob_start();

        require $file;

        return  ob_get_clean();
    }
}