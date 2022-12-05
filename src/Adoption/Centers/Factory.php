<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Faker\Generator;

class Factory
{
    private Generator $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function getCenters(): Collection
    {
        return new ArrayCollection(
            [
                new WoofAwesomeRepository(
                    $this->generator,
                    new Dog()
                ),
                new PurfectRepository(
                    $this->generator,
                    new Cat()
                )
            ]
        );
    }
}