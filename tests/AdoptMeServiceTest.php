<?php

namespace Tests;

use App\Adoption\AdoptMeService;
use App\Adoption\Centers\Factory as CenterFactory;
use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class AdoptMeServiceTest extends TestCase
{
    private AdoptMeService $service;

    public function setUp(): void
    {
        parent::setUp();

        $factory = new CenterFactory(Factory::create());
        $this->service = new AdoptMeService($factory);
    }

    /** @test */
    public function it_expects_adoption_center_to_have_two_dogs_available()
    {
        $center = $this->service->findCenterFor(Dog::identifier());
        $adoptable = $center->findAnimals();

        $this->assertEquals(2, $adoptable->count(), "Expected two dogs.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_one_cat_available()
    {
        $center = $this->service->findCenterFor(Cat::identifier());
        $adoptable = $center->findAnimals();

        $this->assertEquals(1, $adoptable->count(), "Expected one cat.");
    }
}
