<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Advert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class AppFixtures extends Fixture implements OrderedFixtureInterface
{
    /* Deuxieme Ordre toujours grace a OrderedFixtureInterface */

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $advert1 = new Advert();
        $advert1->setDate($faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null))
                ->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true))
                ->setAuthor($faker->name)
                ->setContent($faker->$nbWords = 100, $variableNbWords = true)
                ->setImage($manager->merge($this->getReference('image1')))// On recupere la reference dans l'ordre 1
                ->setPublished(true);
        $manager->persist($advert1);// en persistant advert, on persiste aussi image

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
