<?php declare(strict_types=1);

namespace App\Repository;

use App\Document\Pokemon;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;


class PokemonRepository extends ServiceDocumentRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function findByPokeApiId($id)
    {
        return $this->createQueryBuilder()
            ->field('pokeApiId')->equals($id)
            ->getQuery()
            ->getSingleResult();
    }
}
