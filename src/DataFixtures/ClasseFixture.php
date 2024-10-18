<?php

namespace App\DataFixtures;

use App\Entity\Classe;
use App\Entity\Filiere;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ClasseFixture extends Fixture implements DependentFixtureInterface
{
    private array $filieres;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $this->filieres = $manager->getRepository(Filiere::class)->findAll();
        $a = 1;
        foreach ($this->filieres as $filiere){
            $classe1 = new Classe();
            $classe1->setTitle('Classe '. $a)
                ->addFiliere($filiere)
                ->setAllUser($faker->numberBetween(1,10000))
                ->setSort($a);
            $manager->persist($classe1);
            $a++;
        }
        for($i = 1; $i <= 50; $i++){
            $classe = new Classe();
            $classe->setTitle($faker->word)
                    ->addFiliere($faker->randomElement($this->filieres))
                    ->addFiliere($faker->randomElement($this->filieres))
                    ->setAllUser($faker->numberBetween(1,10))
                    ->setSort($i);
            $manager->persist($classe);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            FiliereFixture::class
        ];
    }
}
