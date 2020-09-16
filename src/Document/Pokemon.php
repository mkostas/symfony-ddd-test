<?php declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use App\Repository\PokemonRepository;

/**
 * @MongoDB\Document(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="int")
     */
    private $pokeApiId;

    /**
     * @MongoDB\Field(type="string")
     */
    private $name;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPokeApiId()
    {
        return $this->pokeApiId;
    }

    /**
     * @param mixed $pokeApiId
     */
    public function setPokeApiId($pokeApiId): void
    {
        $this->pokeApiId = $pokeApiId;
    }
}
