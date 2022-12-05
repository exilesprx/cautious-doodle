<?php

namespace App\Adoption\Centers\Specifications\Species;

class Dog extends Species
{
    public static function identifier(): string
    {
        return "dog";
    }
}