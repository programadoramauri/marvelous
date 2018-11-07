<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryComicsRequest extends AbstractRequest
{

    protected $filters = [
        'format' => 'in:comic,magazine,trade paperback,hardcover,digest,graphic novel,digital comic,infinite comic',
        'formatType' => 'in:comic,collection',
        'noVariants' => 'boolean',
        'dateDescriptor' => 'in:lastWeek,thisWeek,nextWeek,thisMonth',
        'dateRange' => 'dateRange',
        'title' => 'string',
        'titleStartsWith' => 'string',
        'startYear' => 'int',
        'issueNumber' => 'int',
        'diamondCode' => 'string',
        'digitalId' => 'int',
        'upc' => 'string',
        'isbn' => 'string',
        'ean' => 'string',
        'issn' => 'srting',
        'hasDigitalIssue' => 'boolean',
        'modifiedSince' => 'date',
        'creators' => 'int',
        'series' => 'int',
        'events' => 'int',
        'stories' => 'int',
        'sharedAppearences' => 'int',
        'collaborators' => 'int',
        'orderBy' => [
            'focDate',
            'onsaleDate',
            'title',
            'issueNumber',
            'modified',
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
        $url = 'https://gateway.marvel.com/v1/public/comics';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
