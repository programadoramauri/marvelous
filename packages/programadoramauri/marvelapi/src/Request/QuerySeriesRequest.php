<?php

namespace Programadoramauri\Marvelapi\Request;

class QuerySeriesRequest extends AbstractRequest
{

    protected $filter = [
        'title' => 'string',
        'titleStartsWith' => 'string',
        'startYear' => 'int',
        'modifiedSince' => 'date',
        'comics' => 'int',
        'stories' => 'int',
        'events' => 'int',
        'creators' => 'int',
        'characters' => 'int',
        'seriesType' => [
            'collection',
            'one shot',
            'trade paperback',
            'hardCover'
        ],
        'orderBy' => [
            'title',
            'modified',
            'startYear'
        ],
        'limit' => 'int',
        'offset' => 'int'
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
