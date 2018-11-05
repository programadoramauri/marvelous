<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryStoriesRequest extends AbstractRequest
{

    protected $filters = [
        'modifiedSince' => 'date',
        'series' => 'int',
        'events' => 'int',
        'creators' => 'int',
        'characters' => 'int',
        'orderBy' => ['id', 'modified'],
        'limit' => 'int',
        'offset' => 'int'
    ];

    public function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function execute($id = null, $type = null)
    {
        $url = 'https://gateway.marvel.com/v1/public/stories';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
