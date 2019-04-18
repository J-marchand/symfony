<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Pet;

class PetFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');



        for($i = 0; $i < 100; $i++)
        {
            $addPet = new Pet();

            $addPet->setName($faker->firstNameMale);
            $addPet->setPrice($faker->numberBetween($min = 1000, $max = 2000));

            $genderPet = ['male', 'female'];
            shuffle($genderPet);


            $addPet->setGender($genderPet[0]);

            $race = ['Affenpinsches', 'Basset d\'Artois', 'Berger allemand', 'Chien courant serbe'];
            shuffle($race);


            $addPet->setRace($race[0]);


            $manager->persist($addPet);
            $manager->flush();
        }


    }
}
