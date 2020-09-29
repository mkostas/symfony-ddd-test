<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Pokemon\Pokemon;
use App\Domain\Pokemon\Repository\PokemonRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PokemonStoreService
{
//$pokemonRepository->store($pokemon);
    /**
     * @var PokemonRepositoryInterface
     */
    private $pokemonRepository;
    /**
     * @var PokemonApiService
     */
    private $pokemonApiService;
    
    /**
     * PokemonStoreService constructor.
     * @param PokemonRepositoryInterface $pokemonRepository
     * @param PokemonApiService $pokemonApiService
     */
    public function __construct(PokemonRepositoryInterface $pokemonRepository, PokemonApiService $pokemonApiService)
    {
        $this->pokemonRepository = $pokemonRepository;
        $this->pokemonApiService = $pokemonApiService;
    }
    
    public function getAndStoreIfNotFound(int $id) : Pokemon {
        $pokemon = $this->pokemonRepository->get($id);
        
        if (!$pokemon) {
            $pokemon = $this->pokemonApiService->fetchPokemon($id);
        
            if ($pokemon) {
                $this->pokemonRepository->store($pokemon);
                $pokemon = $this->pokemonRepository->get($id);
            } else {
                throw new NotFoundHttpException('No Pokemon found for id ' . $id);
            }
        }
        return $pokemon;
    }
}