<?php

namespace App\Adoption\Centers\Specifications\Species;

use Stringable;

abstract class Species implements Stringable
{
    public function isSatisfiedBy(string $type): bool
    {
        return $type == static::identifier();
    }

    public function __toString(): string
    {
        return static::identifier();
    }

    abstract public static function identifier(): string;
}