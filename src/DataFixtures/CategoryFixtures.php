<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test = new Category();

        $test->setLabel('Evenenemt');
        $test->setHousing($this->getReference('house1'));




        $manager->persist($test);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            HousingFixtures::class,

        ];
    }


}
