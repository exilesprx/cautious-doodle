<?php

namespace Tests;

use App\Adoption\AdoptMeService;
use App\Adoption\Centers\Factory as CenterFactory;
use App\Adoption\Centers\Specifications\Species\Cat;
use App\Adoption\Centers\Specifications\Species\Dog;
use App\Adoption\Centers\WoofAwesomeRepository;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class AdoptMeServiceTest extends TestCase
{
    private AdoptMeService $service;

    public function setUp(): void
    {
        parent::setUp();

        $factory = new CenterFactory(Factory::create());
        $this->service = new AdoptMeService($factory->centers());
    }

    /** @test */
    public function it_expects_adoption_center_to_have_two_dogs_available()
    {
        $adoptable = $this->service->findAnimalsOf(Dog::identifier());

        $this->assertEquals(1, $adoptable->count(), "Expected one dog center.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_one_cat_available()
    {
        $adoptable = $this->service->findAnimalsOf(Cat::identifier());

        $this->assertEquals(1, $adoptable->count(), "Expected one cat center.");
    }

    /** @test */
    public function it_expects_adoption_center_to_have_two_cats_available(): void
    {
        $factory = new CenterFactory(Factory::create());
        $centers = $factory->centers();
        $centers->add(new WoofAwesomeRepository(Factory::create(), new Cat()));

        $this->service = new AdoptMeService($centers);
        $adoptable = $this->service->findAnimalsOf(Cat::identifier());

        $this->assertEquals(2, $adoptable->count(), "Expected one cat.");
    }
}
