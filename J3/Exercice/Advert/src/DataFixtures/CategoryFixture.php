<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Advert;
use Faker\Factory;

class CategoryFixture extends Fixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
    $faker = Factory::create();

    for ($i = 0; $i < 10; $i++) {

        $category = new Category();
        $category->setName($faker->word);

        $manager->persist($category);
        $manager->flush();

        $this->addReference('category'.$i, $category); // on ajoute la reference

        }
    }

    public function getOrder()
    {
        return 2;
    }
}
