<?php

namespace Programadoramauri\Marvelapi\Request;

class QueryCreatorsRequest extends AbstractRequest
{

    protected $filters = [
        'firstName' => 'string',
        'middleName' => 'string',
        'lastName' => 'string',
        'suffix' => 'string',
        'nameStartsWith' => 'string',
        'middleNameStartsWith' => 'string',
        'lastNameStartsWith' => 'string',
        'modifiedSince' => 'date',
        'comics' => 'not_regex:/[A-z.;]/i',
        'series' => 'not_regex:/[A-z.;]/i',
        'stories' => 'not_regex:/[A-z.;]/i',
        'orderBy' => 'in:lastName,fisrtName,middleName,suffix,modified,-lastName,-fisrtName,-middleName,-suffix,-modified',
        'limit' => 'integer',
        'offset' => 'integer'
    ];

    public function __construct($auth)
    {
        parent::__construct($auth);
    }

    public function execute($id = null, $type = null)
    {
        $url = 'https://gateway.marvel.com/v1/public/creators';
        if (!is_null($id)) {
            $url .= '/' . $id;
        }

        if (!is_null($type)) {
            $url .= '/' . $type;
        }

        return $this->sendRequest('GET', $url);
    }
}
