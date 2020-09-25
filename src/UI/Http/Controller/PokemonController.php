<?php
namespace App\UI\Http\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Domain\Pokemon\Repository\PokemonRepositoryInterface;
use App\Infrastructure\PokemonRepository;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController
{
    /**
     * @Route("/pokemon/{id}", name="pokemon123")
     * @param PokemonRepositoryInterface $pokemonRepository
     * @param int $id
     */
    public function index(PokemonRepositoryInterface $pokemonRepository, int $id){
        $pokemon = $pokemonRepository->get($id);
        
        dump($pokemon);
        die();
    }
}