<?php

namespace App\Adoption\Centers;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PurfectRepository extends Repository implements CenterContract
{
    public function findAvailableAnimals(): Collection
    {
        return new ArrayCollection(
            [
                $this->generator->firstName // should be an entity Animal/Dog/Cat/Etc
            ]
        );
    }
}