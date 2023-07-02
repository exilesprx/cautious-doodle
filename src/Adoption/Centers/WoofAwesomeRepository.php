<?php

namespace App\Adoption\Centers;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class WoofAwesomeRepository extends Repository implements CenterContract
{
    public function findAvailableAnimals(): Collection
    {
        // TODO: filter by species
        return new ArrayCollection(
            [
                $this->generator->firstName, // should be an entity Animal/Dog/Cat/Etc
                $this->generator->firstName
            ]
        );
    }
}