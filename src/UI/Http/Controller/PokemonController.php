<?php
namespace App\UI\Http\Controller;

use App\Application\PokemonStoreService;
use App\Infrastructure\PokemonRepository;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController
{
    /**
     * @Route("/pokemon/{id}", name="pokemon123", methods={"GET"})
     * @param PokemonStoreService $pokemonStoreService
     * @param int $id
     */
    public function index(
        PokemonStoreService $pokemonStoreService,
        int $id
    ){
        $pokemon = $pokemonStoreService->getAndStoreIfNotFound($id);
        
        dump($pokemon);
        die();
    }
    
    /**
     * @Route("/battle/{pokemon1}/{pokemon2}", name="pokemon_battle")
     * @param int $pokemon1
     * @param int $pokemon2
     * @param PokemonStoreService $pokemonStoreService
     */
    public function battle(
        int $pokemon1,
        int $pokemon2,
        PokemonStoreService $pokemonStoreService
    ){
        $pokemon1 = $pokemonStoreService->getAndStoreIfNotFound($pokemon1);
        $pokemon2 = $pokemonStoreService->getAndStoreIfNotFound($pokemon2);
        
        dd($pokemon1->getHp(),$pokemon2);
        //dd($pokemon1,$pokemon2);
    }
}