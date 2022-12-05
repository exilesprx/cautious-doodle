<?php

namespace App\Adoption\Centers\Specifications\Species;

class Cat extends Species
{
    public static function identifier(): string
    {
        return "cat";
    }
}