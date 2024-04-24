<?php

namespace App\DataFixtures;

use App\Factory\EscaleFactory;
use App\Factory\TrajetFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 3; $i++) {
            $trajet = TrajetFactory::createOne();
            EscaleFactory::createMany(
                random_int(2, 5),
                ['trajet' => $trajet]
            );
        }
    }
}
