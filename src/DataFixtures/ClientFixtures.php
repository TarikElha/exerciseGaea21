<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ClientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $client1 = new Client();
        $client1->setLastname("Hadley");
        $client1->setFirstname("Carole");
        $client1->setEmail("CaroleMHadley@jourrapide.com");
        $client1->setAdress("Adresse number One");
        $client1->setTel("0123456789");
        $client1->setBirthDate(new \DateTime('1989-06-09'));

        for($i=0; $i<4; $i++){
            $client1->addPossession($this->getReference("possession_".$i));
        }

        $manager->persist($client1);
        
        $client2 = new client();
        $client2->setLastname("Smith");
        $client2->setFirstname("Ellis");
        $client2->setEmail("EllisASmith@jourrapide.com");
        $client2->setAdress("Adresse number Two");
        $client2->setTel("0123456789");
        $client2->setBirthDate(new \DateTime('1975-11-09'));
        $manager->persist($client2);

        $client3 = new client();
        $client3->setLastname("Taylor");
        $client3->setFirstname("Richard");
        $client3->setEmail("RichardKTaylor@jourrapide.com");
        $client3->setAdress("Adresse number Three");
        $client3->setTel("0123456789");
        $client3->setBirthDate(new \DateTime('1954-05-06'));

        for($i=4; $i<7; $i++){
            $client3->addPossession($this->getReference("possession_".$i));
        }

        $manager->persist($client3);

        $client4 = new client();
        $client4->setLastname("Bagwell");
        $client4->setFirstname("Arthur");
        $client4->setEmail("ArthurDBagwell@rhyta.com");
        $client4->setAdress("Adresse number Foor");
        $client4->setTel("0123456789");
        $client4->addPossession($this->getReference("possession_7"));
        $client4->setBirthDate(new \DateTime('1900-05-05'));

        $manager->persist($client4);

        $client5 = new client();
        $client5->setLastname("Martin");
        $client5->setFirstname("Shiela");
        $client5->setEmail("ShielaSMartin@rhyta.com");
        $client5->setAdress("Adresse number Five");
        $client5->setTel("0123456789");
        $client5->setBirthDate(new \DateTime('2000-11-09'));

        for($i=8; $i<14; $i++){
            $client5->addPossession($this->getReference("possession_".$i));
        }
        $manager->persist($client5);

        $client6 = new client();
        $client6->setLastname("McCue");
        $client6->setFirstname("James");
        $client6->setEmail("JamesDMcCue@teleworm.us");
        $client6->setAdress("Adresse number Six");
        $client6->setTel("0123456789");
        $client6->setBirthDate(new \DateTime('1995-01-03'));

        for($i=14; $i<16; $i++){
            $client6->addPossession($this->getReference("possession_".$i));
        }
        $manager->persist($client6);

        $client7 = new client();
        $client7->setLastname("Flannery");
        $client7->setFirstname("Antonio");
        $client7->setEmail("AntonioPFlannery@armyspy.com");
        $client7->setAdress("Adresse number Seven");
        $client7->setTel("0123456789");
        $client7->setBirthDate(new \DateTime('1968-05-08'));

        for($i=16; $i<20; $i++){
            $client7->addPossession($this->getReference("possession_".$i));
        }
        $manager->persist($client7);

        $client8 = new client();
        $client8->setLastname("Mabery");
        $client8->setFirstname("Stephen");
        $client8->setEmail("StephenMMabery@rhyta.com");
        $client8->setAdress("Adresse number Height");
        $client8->setTel("0123456789");
        $client8->setBirthDate(new \DateTime('1937-01-01'));

        $manager->persist($client8);

        $client9 = new client();
        $client9->setLastname("Scott");
        $client9->setFirstname("Daniel");
        $client9->setEmail("DanielKScott@rhyta.com");
        $client9->setAdress("Adresse number Nine");
        $client9->setTel("0123456789");
        $client9->addPossession($this->getReference("possession_20"));
        $client9->setBirthDate(new \DateTime('1980-01-01'));

        $manager->persist($client9);

        $client10 = new client();
        $client10->setLastname("Bailey");
        $client10->setFirstname("Dina");
        $client10->setEmail("DinaPBailey@armyspy.com");
        $client10->setAdress("Adresse number Ten");
        $client10->setTel("0123456789");
        $client10->setBirthDate(new \DateTime('2000-03-13'));

        $manager->persist($client10);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          PossessionFixtures::class,
        ];
    }
}