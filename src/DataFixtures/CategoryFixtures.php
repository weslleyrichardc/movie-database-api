<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable('now', new \DateTimeZone('America/Sao_Paulo'));
        
        $category = new Category();
        $category->setName('Ação');
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Aventura');
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Comédia');
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Drama');
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);
        $manager->persist($category);

        $category = new Category();
        $category->setName('Ficção Científica');
        $category->setCreatedAt($now);
        $category->setUpdatedAt($now);
        $manager->persist($category);

        $manager->flush();
    }
}
