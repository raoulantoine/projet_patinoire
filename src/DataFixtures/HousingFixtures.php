<?php

namespace App\DataFixtures;

use App\Entity\Housing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;


class HousingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $test = new Housing();
        $test->setAdress('155 avenue General Georges Patton');
        $test->setSurface('40');
        $test->setPiece('3');
        $test->setDateEnter(new DateTime('2020/05/12'));
        $test->setDateExit(new DateTime('2021/05/15'));
        $test->setOwner('Ewen');
        $test->setRent('500');
        $this->addReference('house1', $test);




        $manager->persist($test);

        $manager->flush();
    }

}
