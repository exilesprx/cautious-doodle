<?php

namespace Tests;

use App\Adoption\AdoptMeService;
use App\Adoption\Centers\PurfectRepository;
use App\Adoption\Centers\Specifications\Centers\CenterAvailabilitySpec;
use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use App\Adoption\Centers\WoofAwesomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class AdoptMeServiceTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_expects_adoption_center_to_have_two_dogs_available()
    {
        $centers = $this->twoDistinctCenters();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Dog::identifier());

        $this->assertEquals(1, $adoptable->count(), "Expected one dog center.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_one_cat_available()
    {
        $centers = $this->twoDistinctCenters();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Cat::identifier());

        $this->assertEquals(1, $adoptable->count(), "Expected one cat center.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_two_cats_available(): void
    {
        $centers = $this->overlappingCenter();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Cat::identifier());

        $this->assertEquals(2, $adoptable->count(), "Expected two centers for cats.");
    }

    protected function twoDistinctCenters(): ArrayCollection
    {
        return new ArrayCollection(
            [
                new WoofAwesomeRepository(
                    Factory::create(),
                    new ArrayCollection([
                        new Dog()
                    ])
                ),
                new PurfectRepository(
                    Factory::create(),
                    new ArrayCollection([
                        new Cat()
                    ])
                )
            ]
        );
    }

    protected function overlappingCenter(): ArrayCollection
    {
        return new ArrayCollection(
            [
                new WoofAwesomeRepository(
                    Factory::create(),
                    new ArrayCollection([
                        new Dog(),
                        new Cat()
                    ])
                ),
                new PurfectRepository(
                    Factory::create(),
                    new ArrayCollection([
                        new Cat()
                    ])
                )
            ]
        );
    }
}
