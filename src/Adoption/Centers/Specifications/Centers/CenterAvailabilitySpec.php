<?php

namespace App\Adoption\Centers\Specifications\Centers;

use App\Adoption\Centers\CenterContract;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class CenterAvailabilitySpec
{
    public function findAnimals(ArrayCollection $centers): Collection
    {
        // TODO: apply to only available centers
        return $centers->map(function (CenterContract $contract) {
            return $contract->findAvailableAnimals();
        });
    }
}