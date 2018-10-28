<?php

namespace Programadoramauri\Marvelapi\Models\Request;

use \GuzzleHttp\Client;

abstract class AbstractRequest
{

    private $auth;
    protected $url;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    abstract public function execute($id = null, $type = null);

    protected function sendRequest($method, $url, $content = array())
    {
        $client = new Client();
        $url = $url . '?' . http_build_query($this->auth);
        $res = $client->request($method, $url, $content);
        return $res->getBody()->getContents();
    }
}
