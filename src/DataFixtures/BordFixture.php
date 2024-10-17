<?php

namespace App\DataFixtures;

use App\Entity\Bord;
use App\Entity\CollectionBord;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BordFixture extends Fixture implements DependentFixtureInterface
{
    private array $users;
    private array $collectionBords;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $this->users = $manager->getRepository(User::class)->findAll();
        $this->collectionBords = $manager->getRepository(CollectionBord::class)->findAll();
        for ($i = 1; $i <= 50; $i++) {
            $bord = new Bord();
            $bord->setEditor($faker->randomElement($this->users))
            ->setCollection($faker->randomElement($this->collectionBords))
            ->setTitle($faker->sentence($faker->numberBetween(2, 5)))
            ->setAuthor($faker->name)
            ->setKeyword($faker->sentence($faker->numberBetween(2, 15) ))
            ->setOnlineAccess($faker->boolean(70))
            ->setAllUser($faker->numberBetween(0, 5455))
            ->setStar($faker->numberBetween(0, 5));
            if($faker->boolean(70)){
                $bord->setPrice($faker->numberBetween(0, 3000))
                ->setWhatsappNumber(237670104245)
                ->setDescription($faker->paragraph($faker->numberBetween(2, 5)))
                    ->setLastUpdateAt(new \DateTimeImmutable());;
            }
            $bord->setAllGainBord(100)
                ->setAllGainInfooxschool(100)
                ->setOnligne($faker->boolean(70));
            $manager->persist($bord);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixture::class,
            CollectionBordFixture::class
        ];
    }
}
