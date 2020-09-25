<?php
namespace App\Domain\Pokemon\ValueObject\Name;

use Doctrine\ODM\MongoDB\Types\ClosureToPHP;
use Doctrine\ODM\MongoDB\Types\Type;

class NameType extends Type
{
    use ClosureToPHP;
    
    public function convertToPHPValue($value)
    {
        //return Name::fromString((string)$value);
        return new Name($value);
    }
    
    public function convertToDatabaseValue($value)
    {
        return $value->toString();
    }
}