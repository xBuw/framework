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
    protected $content = '';

    /**
     * Response constructor.
     * @param $content
     * @param int $code
     */
    public function __construct($content, $code = 200)
    {
        $this->codeAnswer = $code;
        $this->content = $content;
        $this->addHeader('Content-Type', 'text/html');
    }

    /**
     * @param $key
     * @param $value
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Send response
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendBody();
        exit();
    }

    /**
     * Form headers, and send them.
     */
    public function sendHeaders()
    {
        header($_SERVER['SERVER_PROTOCOL'] . " " . $this->codeAnswer);
        if (!empty($this->headers)) {
            foreach ($this->headers as $key => $value) {
                header($key . ": " . $value);
            }
        }
    }

    /**
     * Display content.
     */
    public function sendBody()
    {
        echo $this->content;
    }
}