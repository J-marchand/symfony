<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');


        for ($i = 0; $i < 10; $i++)
        {
            $film = new Film();

            $film->setTitle($faker->sentence($nbWords = 3, $variableNbWords = true));
            $film->setDescription($faker->sentence($nbWords = 50, $variableNbWords = true));
            $film->setPublichDate($faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null));
            $film->setDirector($faker->words($nb = 3, $asText = false));
            $film->setActors($faker->words($nb = 3, $asText = false));
            $film->setImg($faker->imageUrl($width = 640, $height = 480));
            $manager->persist($film);
        }

        $manager->flush();
    }
}
