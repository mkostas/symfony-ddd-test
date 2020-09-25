<?php
namespace App\Domain\Pokemon;

use App\Domain\Pokemon\ValueObject\Name\Name;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass=PokemonRepository::class)
 */
class Pokemon
{
    /**
     * @MongoDB\Id
     */
    private $_id;
    
    /**
     * @MongoDB\Field(type="int")
     */
    private int $id;
    
    /**
     * @MongoDB\Field(type="Name")
     */
    private Name $name;
    
}