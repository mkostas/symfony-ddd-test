<?php declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Repository;

use App\Domain\Pokemon\Pokemon;
use App\Domain\Pokemon\Repository\PokemonRepositoryInterface;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;


class PokemonRepository extends ServiceDocumentRepository implements PokemonRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function get(int $id) : Pokemon
    {
        $query =  $this->createQueryBuilder()
            ->field('id')->equals($id)
            ->getQuery()->getSingleResult();
    
            return $query;
    }
}
