<?php

namespace App\Controller;

use App\Document\Pokemon;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiController extends AbstractController
{
    /**
     * @Route("/api/v1/{id}", name="pokemon_endpoint")
     */
    public function index(
        int $id,
        DocumentManager $dm,
        HttpClientInterface $httpClient
    )
    {
        $mongoClient = $dm->getClient();
        $collection = $mongoClient->selectCollection("PokemonApi","Pokemon");
        $pokemon = $collection->findOne([
            'id' =>  $id,
        ]);

        if (!$pokemon) {
            $pokeApiResponse = $httpClient->request(
                'GET',
                'https://pokeapi.co/api/v2/pokemon/' . $id,
                [
                    "bindto" => "0:0"
                ]
            );

            if(!$pokeApiResponse) {
                throw $this->createNotFoundException('No Pokemon found for id ' . $id);
            }

            $pokemon = json_decode($pokeApiResponse->getContent());
            $collection->insertOne($pokemon);
        }

        return $this->json($pokemon);
    }
}
