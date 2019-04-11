<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker;
use App\Entity\Category;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();


        for ($i = 0; $i < 10; $i++)
        {

            $category = new Category();
            $category->setName($faker->word);

            $manager->persist($category);
            $manager->flush();
            $this->addReference('category'.$i, $category);
        }


    }

    public function getOrder()
    {
        return 1;
    }


}
