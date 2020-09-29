<?php

namespace App\Domain\Pokemon\Repository;

use App\Domain\Pokemon\Pokemon;
use stdClass;

interface PokemonRepositoryInterface
{
    public function get(int $id): ?Pokemon;
    
    public function store(stdClass $pokemon): void;
}