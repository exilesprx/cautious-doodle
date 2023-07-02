<?php

namespace App\Adoption\Centers\Specifications\Centers;

use App\Adoption\Centers\CenterContract;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class CenterAvailabilitySpec
{
    private ArrayCollection $centers;

    public function __construct(ArrayCollection $centers)
    {
        $this->centers = $centers;
    }

    public function findAnimals(): Collection
    {
        return $this->centers->map(function (CenterContract $contract) {
            return $contract->findAvailableAnimals();
        });
    }
}