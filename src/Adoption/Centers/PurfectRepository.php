<?php

namespace App\Adoption\Centers;

use App\Adoption\Centers\Specifications\Species\Cat;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class PurfectRepository extends Repository implements CenterContract
{
    public function findAvailableAnimals(): Collection
    {
        return (new ArrayCollection(
            [
                [
                    'name' => $this->generator->firstName,
                    'type' => Cat::identifier()
                ]
            ]
        ))
            ->matching($this->criteriaOf($this->species));
    }
}