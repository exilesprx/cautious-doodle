<?php

namespace App\Adoption;

use App\Adoption\Centers\Factory;
use App\Adoption\Centers\Repository;
use App\Adoption\Centers\Specifications\Centers\CenterAvailabilitySpec;

class AdoptMeService
{
    private Factory $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function findCenterFor(string $species): CenterAvailabilitySpec
    {
        $centers = $this->factory->getCenters();

        $center = $centers->findFirst(function (int $key, Repository $center) use ($species) {
            return $center->isSatisfiedBy($species);
        });

        return new CenterAvailabilitySpec($center);
    }
}