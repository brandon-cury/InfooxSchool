<?php

namespace App\DataFixtures;

use App\Entity\Examen;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ExamenFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $examens = [
            'Licence',
            'DUT',
            'BTS',
            'DEUG',
            'CEP',
            'CAP',
            'BEPC',
            'Probatoire',
            'BAC'
        ];
        $i = 1;
        foreach ($examens as $examen_title) {
            $examen = new Examen();
            $examen->setTitle($examen_title)
                    ->setImage($faker->imageUrl( 640, 480))
                    ->setSort($i);
            $manager->persist($examen);
            $i++;
        }
        $manager->flush();
    }
}
