<?php

namespace Programadoramauri\Marvelapi\Request;

use \GuzzleHttp\Client;

/**
 * Class AbstractRequest
 *
 * @package Programadoramauri\Marvelapi\Request
 */

 abstract class AbstractRequest
 {

    private $auth;
    protected $url;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

     public abstract function execute($id = null, $type = null);

     protected function sendRequest($method, $url, $content = array())
     {
        $client = new Client();
        $url = $url.'?'.http_build_query($this->auth);
        $res = $client->request($method, $url, $content);
        return json_decode($res->getBody()->getContents());
     }

     protected function readResponse($statusCode, $responseBody)
     {
        switch($statusCode) {
            case 200:
            break;
            case 201:
            break;
            case 401:
            break;
            case 403:
            break;
            case 404:
            break;
            case 405:
            break;
            case 409:
            break;
            default:
        }
     }

 }
