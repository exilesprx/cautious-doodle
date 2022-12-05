<?php

namespace App\Adoption\Centers;

use Doctrine\Common\Collections\Collection;

interface CenterContract
{
    public function findAvailableAnimals(): Collection;
}