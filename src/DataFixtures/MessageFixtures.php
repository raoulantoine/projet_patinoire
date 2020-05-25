<?php

namespace App\DataFixtures;

use App\Entity\Message;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class MessageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test = new Message();
        $test->setUser($this->getReference('user1'));
        $test->setHousing($this->getReference('house1'));
        $test->setText('Bonjour, je me permets de vous contacter pour le loyer');


        $manager->persist($test);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            HousingFixtures::class,

        ];
    }

}
