<?php declare(strict_types=1);

namespace App\Infrastructure\Pokemon\Repository;

use App\Domain\Pokemon\Pokemon;
use App\Domain\Pokemon\Repository\PokemonRepositoryInterface;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use stdClass;

class PokemonRepository extends ServiceDocumentRepository implements PokemonRepositoryInterface
{
    /**
     * @var DocumentManager
     */
    private DocumentManager $documentManager;
    
    public function __construct(ManagerRegistry $registry, DocumentManager $documentManager)
    {
        parent::__construct($registry, Pokemon::class);
        $this->documentManager = $documentManager;
    }

    public function get(int $id) : ?Pokemon
    {
        return $this->createQueryBuilder()
            ->field('id')->equals($id)
            ->getQuery()->getSingleResult();
    }
    
    public function store(stdClass $pokemon): void
    {
        $mongoClient = $this->documentManager->getClient();
        $collection = $mongoClient->selectCollection("PokemonApi","Pokemon");
        $collection->insertOne($pokemon);
    }
    
    
}
