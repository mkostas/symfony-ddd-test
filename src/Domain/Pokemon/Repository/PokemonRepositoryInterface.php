<?php


namespace App\Domain\Pokemon\Repository;


use App\Domain\Pokemon\Pokemon;

interface PokemonRepositoryInterface
{
    public function get(int $id): Pokemon;
    
    //public function store(User $user): void;
}