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
        $id,
        DocumentManager $dm,
        HttpClientInterface $client
    )
    {
        $pokemon = $dm->getRepository(Pokemon::class)->findByPokeApiId($id);

        if (!$pokemon) {
            $pokeApiResponse = $client->request(
                'GET',
                'https://pokeapi.co/api/v2/pokemon/' . $id
            );

            if(!$pokeApiResponse) {
                throw $this->createNotFoundException('No Pokemon found for id ' . $id);
            }

            $pokemonData = json_decode($pokeApiResponse->getContent());

            $pokemon = new Pokemon();
            $pokemon->setPokeApiId($id);
            $pokemon->setName($pokemonData->name);

            $dm->persist($pokemon);
            $dm->flush();
        }

        return $this->json([
            'message' => 1,
            'path' => 'src/Controller/ApiController.php',
        ]);
    }
}
