<?php

namespace App\Adoption\Centers\Specifications\Species;

abstract class Species
{
    public function isSatisfiedBy(string $type): bool
    {
        return $type == static::identifier();
    }

    abstract public static function identifier(): string;
}