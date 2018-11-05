<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryCharactersRequest extends AbstractRequest
{

    protected $filters = [
        'name' => 'string',
        'nameStartsWith' => 'string',
        'modifiedSince' => 'date',
        'comics' => 'int',
        'series' => 'int',
        'events' => 'int',
        'stories' => 'int',
        'orderBy' => ['name', 'modified'],
        'limit' => 'int',
        'offset' => 'int'
    ];

    public function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function execute($id = null, $type = null)
    {
        $url = 'https://gateway.marvel.com/v1/public/characters';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
