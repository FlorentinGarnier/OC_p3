<?php

namespace app;

class Response
{
    private $content;


    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Last action
     */
    public function takeOff()
    {
        echo $this->getContent();
        exit;
    }




}