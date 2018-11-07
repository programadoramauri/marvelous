<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryEventsRequest extends AbstractRequest
{

    protected $filters = [
        'name' => 'string',
        'nameStartsWith' => 'string',
        'modifiedSince' => 'date',
        'creators' => 'not_regex:/[A-z.;]/i',
        'characters' => 'not_regex:/[A-z.;]/i',
        'series' => 'not_regex:/[A-z.;]/i',
        'comics' => 'not_regex:/[A-z.;]/i',
        'stories' => 'not_regex:/[A-z.;]/i',
        'orderBy' => 'in:name,startDate,modified,-name,-startDate,-modified',
        'limit' => 'integer',
        'offset' => 'integer'
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
