<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Species;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Generator;

abstract class Repository
{

    protected Generator $generator;
    protected ArrayCollection $specifications;

    public function __construct(Generator $generator, ArrayCollection $specifications)
    {
        $this->generator = $generator;
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(string $species): bool
    {
        return $this->specifications->exists(function ($key, Species $spec) use ($species) {
            return $spec->isSatisfiedBy($species);
        });
    }
}