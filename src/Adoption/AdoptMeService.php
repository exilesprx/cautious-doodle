<?php

namespace App\Adoption;

use App\Adoption\Centers\Repository;
use App\Adoption\Centers\Specifications\Centers\CenterAvailabilitySpec;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class AdoptMeService
{
    private CenterAvailabilitySpec $spec;
    private ArrayCollection $centers;

    public function __construct(CenterAvailabilitySpec $spec, ArrayCollection $centers)
    {
        $this->spec = $spec;
        $this->centers = $centers;
    }

    public function findAnimalsOf(string $species): Collection
    {
        $centers = $this->centers->filter(function (Repository $center) use ($species) {
            return $center->isSatisfiedBy($species);
        });

        return $this->spec->findAnimals($centers);
    }
}