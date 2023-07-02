<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Generator;

class Factory
{
    private Generator $generator;

    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }

    public function centers(): ArrayCollection
    {
        // TODO: these are mocked repositories that would be configured through a file or database
        return new ArrayCollection(
            [
                new WoofAwesomeRepository(
                    $this->generator,
                    new ArrayCollection([
                        new Dog()
                    ])
                ),
                new PurfectRepository(
                    $this->generator,
                    new ArrayCollection([
                        new Cat()
                    ])
                )
            ]
        );
    }
}