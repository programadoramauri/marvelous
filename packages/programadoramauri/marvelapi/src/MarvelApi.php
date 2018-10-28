<?php

namespace Programadoramauri\Marvelapi;

use Carbon\Carbon;
use Programadoramauri\Marvelapi\Request\QueryCharactersRequest;

class MarvelApi
{
    private $auth;

    public function __construct($publicKey = null)
    {
        $this->publicKey = env('MARVEL_PUBLIC_KEY', $publicKey);
        $this->privateKey = env('MARVEL_PRIVATE_KEY', null);
        $this->timestamp = Carbon::now()->timestamp;

        $this->hash = md5($this->timestamp.$this->privateKey.$this->publicKey);

        $this->auth = [
            'apikey' => env('MARVEL_PUBLIC_KEY', $publicKey),
            'ts' => Carbon::now()->timestamp,
            'hash' => md5($this->timestamp.$this->privateKey.$this->publicKey),
        ];

        if(is_null($this->publicKey)) throw new \Exception('Public key can\' be null');
        if(is_null($this->privateKey)) throw new \Exception('Private key can\'t be null');
    }

    public function getCharacters($id = null, $type = null)
    {
        $queryGetCharacters = new QueryCharactersRequest($this->auth);
        return $queryGetCharacters->execute($id, $type);
    }

    public function getComics($id = null, $type = null)
    {
        $queryGetComics = new QueryComics($this->auth);
        return $queryGetComics->execute($id, $type);
    }

    public function getCreators($id = null, $type = null)
    {
        $queryGetCreators = new QueryCreators($this->auth);
        return $queryGetCreators->execute($id, $type);
    }

    public function getEvents($id = null, $type = null)
    {
        $queryGetEvents = new QueryEvents($this->auth);
        return $queryGetEvents->execute($id, $type);
    }

    public function getSeries($id = null, $type = null)
    {
        $queryGetSeries = new QuerySeries($this->auth);
        return $queryGetSeries->execute($id, $type);
    }

    public function getStories($id = null, $type = null)
    {
        $queryGetStories = new QueryStories($this->auth);
        return $queryGetStories->execute($id, $type);
    }
}
