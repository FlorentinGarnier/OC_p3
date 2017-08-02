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

    private $method;

    private $session;





    public function __construct()
    {
        $this->setParam($_GET);
        $this->setPost($_POST);
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->session = $_SESSION;

    }


    /**
     * @return Request
     */
    public static function getRequest()
    {

        if (self::$request){
            return self::$request;
        } else return new Request();
    }
    /**
     * @return mixed
     */
    public function getSession($type)
    {
        if (isset($this->session[$type])){
            return $this->session[$type];
        }

        return false;
    }

    /**
     * @param $elm
     * @param $value
     * @internal param mixed $session
     */
    public function setSession($type, $elm, $value)
    {
        $_SESSION[$type][$elm] = $value;
        return $this;
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
                if (isset ($this->post[$param])){

                    return $this->post[$param];

                }
            }


        return false;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return array
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param array $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function isPost()
    {
        if ($this->getMethod() === 'POST'){
            return true;
        }

        return false;
    }

    public function isGet()
    {
        if ($this->getMethod() === 'GET'){
            return true;
        }

        return false;
    }



}