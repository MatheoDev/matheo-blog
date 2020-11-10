<?php

namespace App\DataFixtures;

use App\Entity\Publication;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PubliFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 6; $i++) {
            $publi = new Publication();
            $publi->setTitle('Titre de l\'article '.$i)
                ->setContent('Contenu de l\'article blablabalbla balbalbala blabalba')
                ->setCreatedAt(new \DateTime())
            ;
            $manager->persist($publi);
        }
        $manager->flush();
    }
}
