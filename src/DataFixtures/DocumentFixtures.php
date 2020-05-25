<?php

namespace App\DataFixtures;

use App\Entity\Document;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class DocumentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $test = new Document();

        $test->setFichier('Quitance');
        $test->setFichier('Bail');
        $test->setFichier('Etatdeslieux');
        $test->setFichier('Contrat');
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
