<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryEventsRequest extends AbstractRequest
{

    protected $filters = [
        'name' => 'string',
        'nameStartsWith' => 'string',
        'modifiedSince' => 'date',
        'creators' => 'int',
        'characters' => 'int',
        'series' => 'int',
        'comics' => 'int',
        'stories' => 'int',
        'orderBy' => ['name', 'startDate', 'modified'],
        'limit' => 'int',
        'offset' => 'int'
    ];

    public function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function execute($id = null, $type = null)
    {
        $url = 'https://gateway.marvel.com/v1/public/events';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
