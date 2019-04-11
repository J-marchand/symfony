<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Faker;
use App\Entity\Product;


class ProductFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();


        for ($i = 0; $i < 10; $i++)
        {
            $product = new Product();
            $product->setName($faker->word);
            $product->setCategory($this->getReference('category'.$i));
            $product->setDescription($faker->sentence($nbWords = 50, $variableNbWords = true));
            $product->setPrice($faker->numberBetween($min = 5, $max = 100));
            $product->setQuantity($faker->numberBetween($min = 1, $max = 100));

            $manager->persist($product);
            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 2;
    }
}
