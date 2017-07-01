<?php

namespace app;

class Request
{

    const __ROOT_DIR__ = __DIR__ . "/../";

    /**
     * @var $get array
     */
    private $param;

    private $post;


    public function __construct()
    {
        $this->param = $_GET;
        $this->post = $_POST;

    }

    public static function getRequest()
    {
        return new Request();
    }



    /**
     * @return array
     */
    public function getParam($name)
    {
        return $this->param[$name];
    }

    /**
     * @param array $param
     */
    public function setParam($param)
    {
        $this->param = $param;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

}