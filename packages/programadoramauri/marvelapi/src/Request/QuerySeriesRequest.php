<?php

namespace Programadoramauri\Marvelapi\Request;

class QuerySeriesRequest extends AbstractRequest
{

    protected $filter = [
        'title' => 'string',
        'titleStartsWith' => 'string',
        'startYear' => 'integer',
        'modifiedSince' => 'date',
        'comics' => 'not_regex:/[A-z.;]/i',
        'stories' => 'not_regex:/[A-z.;]/i',
        'events' => 'not_regex:/[A-z.;]/i',
        'creators' => 'not_regex:/[A-z.;]/i',
        'characters' => 'not_regex:/[A-z.;]/i',
        'seriesType' => 'in:collection,one shot,trade paperback,hardCover',
        'orderBy' => 'in:title,modified,startYear,-title,-modified,-startYear',
        'limit' => 'integer',
        'offset' => 'integer'
    ];

    public function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function execute($id = null, $type = null)
    {
        $url = 'https://gateway.marvel.com/v1/public/series';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
