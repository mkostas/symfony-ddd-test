<?php


namespace App\Application;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokemonApiService
{
    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $httpClient;
    
    /**
     * PokemonApiService constructor.
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    
    public function fetchPokemon($id) {
        $response = $this->httpClient->request(
            'GET',
            'https://pokeapi.co/api/v2/pokemon/' . $id,
            [
                "bindto" => "0:0"
            ]
        );
        
        return json_decode($response->getContent());
    }
}