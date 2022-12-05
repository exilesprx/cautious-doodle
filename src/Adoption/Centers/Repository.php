<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Species;
use Faker\Generator;

abstract class Repository
{

    protected Generator $generator;
    protected Species $specification;

    public function __construct(Generator $generator, Species $specification)
    {
        $this->generator = $generator;
        $this->specification = $specification;
    }

    public function isSatisfiedBy(string $species): bool
    {
        return $this->specification->isSatisfiedBy($species);
    }
}