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
    private $field;
    public function __construct($var)
    {
        $this->field = $var;
    }
    public function send(){
        echo $this->field." : params. Hi from response";
    }
}