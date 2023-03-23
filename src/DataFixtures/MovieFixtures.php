<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Movie;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo'));
        $drama = $manager->getRepository(Category::class)->findOneBy(['name' => 'Drama']);
        
        $movie = new Movie();
        $movie->setTitle('O Poderoso Chefão');
        $movie->setYear('1972');
        $movie->setDirector('Francis Ford Coppola');
        $movie->setSynopsis('O filme se passa em 1945, quando o Don Vito Corleone está prestes a completar 60 anos de idade. O filme começa com o funeral de Don Tommasino, o chefe da máfia siciliana que foi assassinado por ordem do Don Vito.');
        $movie->addCategory($drama);
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('O Poderoso Chefão II');
        $movie->setYear('1974');
        $movie->setDirector('Francis Ford Coppola');
        $movie->setSynopsis('O filme se passa em 1958, quando o Don Vito Corleone está prestes a completar 70 anos de idade. O filme começa com o funeral de Don Tommasino, o chefe da máfia siciliana que foi assassinado por ordem do Don Vito.');
        $movie->addCategory($drama);
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('O Poderoso Chefão III');
        $movie->setYear('1990');
        $movie->setDirector('Francis Ford Coppola');
        $movie->setSynopsis('O filme se passa em 1979, quando o Don Vito Corleone está prestes a completar 90 anos de idade.');
        $movie->addCategory($drama);
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Batman: O Cavaleiro das Trevas');
        $movie->setYear('2008');
        $movie->setDirector('Christopher Nolan');
        $movie->setSynopsis('O filme se passa em Gotham City, onde o Batman (Christian Bale) está lutando contra o crime organizado. O Coringa (Heath Ledger) é um criminoso psicopata que está tentando dominar a cidade.');
        $movie->addCategory($drama);
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);
        $manager->persist($movie);

        $movie = new Movie();
        $movie->setTitle('Batman: O Cavaleiro das Trevas Ressurge');
        $movie->setYear('2012');
        $movie->setDirector('Christopher Nolan');
        $movie->setSynopsis('O filme se passa em Gotham City, onde o Batman (Christian Bale) está lutando contra o crime organizado. O Coringa (Heath Ledger) é um criminoso psicopata que está tentando dominar a cidade.');
        $movie->addCategory($drama);
        $movie->setCreatedAt($now);
        $movie->setUpdatedAt($now);
        $manager->persist($movie);
        
        $manager->flush();
    }
}
