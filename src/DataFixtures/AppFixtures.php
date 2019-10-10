<?php

namespace App\DataFixtures;

use App\Domain\Entity\DefaultEntity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $def1 = new DefaultEntity('test');
        $def2 = new DefaultEntity('test');
        $def3 = new DefaultEntity('test');
        $def4 = new DefaultEntity('test');
        $def5 = new DefaultEntity('test');

        $manager->persist($def1);
        $manager->persist($def2);
        $manager->persist($def3);
        $manager->persist($def4);
        $manager->persist($def5);

        $manager->flush();
    }
}
