<?php

namespace App\Domain\Pokemon\ValueObject\Name;

use JsonSerializable;

final class Name implements JsonSerializable
{
    private string $name;
    
    /**
     * Name constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    
    public function toString(): string
    {
        return $this->name;
    }
    
    public function __toString(): string
    {
        return $this->name;
    }
    
    public function jsonSerialize(): string
    {
        return $this->toString();
    }
}