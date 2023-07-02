<?php

namespace App\Adoption;

use App\Adoption\Centers\Repository;
use App\Adoption\Centers\Specifications\Centers\CenterAvailabilitySpec;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class AdoptMeService
{
    private ArrayCollection $centers;

    public function __construct(ArrayCollection $centers)
    {
        $this->centers = $centers;
    }

    public function findAnimalsOf(string $species): Collection
    {
        $centers = $this->centers->filter(function (Repository $center) use ($species) {
            return $center->isSatisfiedBy($species);
        });

        $spec = new CenterAvailabilitySpec($centers);

        return $spec->findAnimals();
    }
}