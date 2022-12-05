<?php

namespace App\Adoption\Centers\Specifications\Centers;

use App\Adoption\Centers\CenterContract;
use Doctrine\Common\Collections\Collection;

class CenterAvailabilitySpec
{
    private CenterContract $center;

    public function __construct(CenterContract $center)
    {
        $this->center = $center;
    }

    public function findAnimals(): Collection
    {
        return $this->center->findAvailableAnimals();
    }
}