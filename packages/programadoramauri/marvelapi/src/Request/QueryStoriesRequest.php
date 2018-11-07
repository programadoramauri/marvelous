<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryStoriesRequest extends AbstractRequest
{

    protected $filters = [
        'modifiedSince' => 'date',
        'series' => 'not_regex:/[A-z.;]/i',
        'events' => 'not_regex:/[A-z.;]/i',
        'creators' => 'not_regex:/[A-z.;]/i',
        'characters' => 'not_regex:/[A-z.;]/i',
        'orderBy' => 'in:id,modified,-id,-modified',
        'limit' => 'integer',
        'offset' => 'integer'
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
