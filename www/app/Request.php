<?php

namespace app;

class Request
{



    /**
     * @var $get array
     */
    private $param;

    private static $request;

    private $post;


    public function __construct()
    {
        $this->param = $_GET;
        $this->post = $_POST;

    }

    public static function getRequest()
    {

        if (self::$request){
            return self::$request;
        } else return new Request();
    }


    /**
     * @param $name
     * @return string
     */
    public function getParam($name)
    {
        if (isset($this->param[$name])) {
            return $this->param[$name];
        } else return null;

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
    public function getPost($param = null)
    {
        if ($param){
            return $this->post[$param];
        }

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