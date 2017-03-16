<?php
/**
 * Created by PhpStorm.
 * User: Стас
 * Date: 16.03.2017
 * Time: 17:10
 */

namespace xbuw\framework\Response;


class Response
{
    public $codeAnswer;
    protected $headers = [];
    protected $playload = '';

    public function __construct($content, $code = 200)
    {
        $this->codeAnswer = $code;
        $this->playload = $content;
        $this->addHeader('Content-Type', 'text/html');
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendBody();
        exit();
    }

    public function sendHeaders()
    {
        header($_SERVER['SERVER_PROTOCOL'] . " " . $this->codeAnswer);
        if (!empty($this->headers)) {
            foreach ($this->headers as $key => $value) {
                header($key . ": " . $value);
            }
        }
    }
    
    public function sendBody()
    {
        echo $this->playload;
    }
}