<?php

namespace Tests;

use App\Adoption\AdoptMeService;
use App\Adoption\Centers\PurfectRepository;
use App\Adoption\Centers\Specifications\Centers\CenterAvailabilitySpec;
use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use App\Adoption\Centers\WoofAwesomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
        $centers = $this->hasCatAndDogCenter();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Dog::identifier());
        $dogs = $this->getAdoptableCountFromCenters($adoptable);

        $this->assertEquals(1, $adoptable->count(), "Expected one dog center.");
        $this->assertEquals(2, $dogs, "Expected two dogs.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_one_cat_available()
    {
        $centers = $this->hasCatAndDogCenter();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Cat::identifier());
        $cats = $this->getAdoptableCountFromCenters($adoptable);

        $this->assertEquals(1, $adoptable->count(), "Expected one cat center.");
        $this->assertEquals(1, $cats, "Expected one cat.");
    }

    /** @test */
    public function it_expects_adoption_centers_to_have_four_animals_available(): void
    {
        $centers = $this->hasTwoCatAndOneDogCenter();
        $service = new AdoptMeService(new CenterAvailabilitySpec(), $centers);
        $adoptable = $service->findAnimalsOf(Cat::identifier());
        $animals = $this->getAdoptableCountFromCenters($adoptable);

        $this->assertEquals(2, $adoptable->count(), "Expected two centers for cats.");
        $this->assertEquals(4, $animals, "Expected four animals.");
    }

    protected function hasCatAndDogCenter(): ArrayCollection
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

    protected function hasTwoCatAndOneDogCenter(): ArrayCollection
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

    protected function getAdoptableCountFromCenters(Collection $adoptable): int
    {
        $animals = 0;
        do {
            $animals += count($adoptable->current()->toArray());
        } while ($adoptable->next());

        return $animals;
    }
}
