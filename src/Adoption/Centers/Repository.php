<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Species;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;
use Faker\Generator;

abstract class Repository
{

    protected Generator $generator;
    protected ArrayCollection $species;

    public function __construct(Generator $generator, ArrayCollection $species)
    {
        $this->generator = $generator;
        $this->species = $species;
    }

    public function isSatisfiedBy(string $species): bool
    {
        return $this->species->exists(function ($key, Species $spec) use ($species) {
            return $spec->isSatisfiedBy($species);
        });
    }

    protected function criteriaOf(ArrayCollection $collection): Criteria
    {
        $criteria = new Criteria();
        $comparison = new Comparison(
            'type',
            Comparison::IN,
            $collection->map(function ($item) {
                return (string)$item;
            })->toArray()
        );
        return $criteria->where($comparison);
    }
}