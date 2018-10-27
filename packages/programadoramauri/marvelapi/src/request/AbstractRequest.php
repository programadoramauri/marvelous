<?php

namespace Programadoramauri\Marvelapi\Request;


/**
 * Class AbstractRequest
 *
 * @package Programadoramauri\Marvelapi\Request
 */

 abstract class AbstractRequest
 {
     public abstract function execute($param);

     protected function sendRequest($method, $url, $content = null)
     {
        $client = new GuzzleHttp\Client();


        $res = $client->request($method, $url, $content);
     }

 }
