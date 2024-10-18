<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    private object $hasher;


    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for($i = 1; $i <= 20; $i++){
            $user = new User();
            $user->setEmail($faker->email)
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->hasher->hashPassword($user, 'password'))
            ->setFirstName($faker->firstName)
            ->setLastName($faker->lastName);
            if($faker->boolean(70)){
                $user->setTel(670104245)
                    ->setCodeTel(237)
                    ->setAvatar($faker->imageUrl($width = 640, $height = 480));
            }
            $user->setNumberAffiliated(5)
                ->setcreatedAt(new \DateTimeImmutable());
            if($faker->boolean(45)){

                $user->setupdatedAt(new \DateTimeImmutable())
                ->setEmailVerifiedAt(new \DateTimeImmutable());
            }

            $manager->persist($user);
        }
        $manager->flush();
    }
}
