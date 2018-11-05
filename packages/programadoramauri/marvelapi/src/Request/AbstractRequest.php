<?php

namespace Programadoramauri\Marvelapi\Request;

use Illuminate\Support\Collection;
use \GuzzleHttp\Client;

abstract class AbstractRequest
{

    private $auth;
    protected $filters;

    public function __construct($auth)
    {
        $this->auth = $auth;
        $this->filters = collect($this->filters);
    }

    abstract public function execute($id = null, $type = null);

    protected function sendRequest($method, $url, $content = array())
    {
        $client = new Client();
        $url = $url . '?' . http_build_query($this->auth);
        $res = $client->request($method, $url, $content);
        return $res->getBody()->getContents();
    }

    public function setFilter(array $content)
    {
        $this->validate(collect($content));
    }

    public function validate(Collection $content)
    {
        $content->each(function ($value, $key) {

            var_dump($key);
            var_dump($value);

        });
        exit;
    }
}
