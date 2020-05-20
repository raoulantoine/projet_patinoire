<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class UserFixtures extends Fixture

{

    public function load(ObjectManager $manager)
    {
        $test = new User();
        $test ->setFistName('Antoine');
        $test ->setLastName("Raoul");
        $test ->setEmail('antoine.raoul@live.fr');
        $test ->setPassword("000");



        $manager->persist($test);

        $test2 = new User();
        $test2 ->setFistName('ewen');
        $test2 ->setLastName("ewen");
        $test2 ->setEmail('ewen.raoul@live.fr');
        $test2 ->setPassword("root");



        $manager->persist($test2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [UserFixtures::class
        ];
    }
}


