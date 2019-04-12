<?php


namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker\Factory;

class ImageFixture extends Fixture implements OrderedFixtureInterface
{
    /* Premier Ordre  grace a OrderedFixtureInterface */

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++){

            $image1 = new Image();
            $image1->setUrl($faker->imageUrl(200, 200, 'cats', true, 'Faker'));
            $image1->setAlt($faker->sentence($nbWords = 8, $variableNbWords = true));
            $manager->persist($image1); // On persiste

            $manager->flush();

            $this->addReference('image1'.$i, $image1); // on ajoute la reference
        }
    }


    public function getOrder() // on defini l'ordre d'axecution
    {
        return 1;
    }
}
