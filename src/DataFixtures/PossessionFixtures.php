<?php

namespace App\DataFixtures;

use App\Entity\Possession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PossessionFixtures extends Fixture
{

    public const POSSESSIONS = [
        ["Maison", 1500000, "Immobilier"],
        ["Plush pony", 1000, "animal"],
        ["Box of Q-tips", 50, "Box"],
        ["Packing peanuts", 3, "food"],
        ["Spool of wire", 12000, "usefull"],
        ["Lip gloss", 10, "beautiful"],
        ["Chapter book", 0.5, "incomplete"],
        ["Lighter", 12.6, "light !"],
        ["Mouse pad", 2.3, "you know"],
        ["Canvas", 53.8, "a brand ?"],
        ["Street lights", 56, "light too"],
        ["Paintbrush", 58.9, "painting"],
        ["Candy bar", 20.6, "good food"],
        ["Martini glass", 7.4, "and not too drink"],
        ["Chicken", 4.5, "food"],
        ["Toe ring", 55, "waaw"],
        ["Bottle of pills", 12.4, "nope"],
        ["Clock", 8, "it's time"],
        ["Brush", 2.3, "clean"],
        ["duck", 7.5, "food too"],
        ["Baseball", 8, "yeah"],
    ];

    public function load(ObjectManager $manager): void
    {
        for($i=0; $i<count(SELF::POSSESSIONS); $i++){
            $possession = new Possession();
            $possession->setName(SELF::POSSESSIONS[$i][0]);
            $possession->setPrice(SELF::POSSESSIONS[$i][1]);
            $possession->setType(SELF::POSSESSIONS[$i][2]);
            $manager->persist($possession);
            $this->addReference("possession_".$i, $possession);
        }

        $manager->flush();
    }
}
