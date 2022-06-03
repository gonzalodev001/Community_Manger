<?php


namespace App\Person\Infrastructure\Persistence\Doctrine;


use App\Person\Domain\Aggregate\Person;
use App\Person\Domain\Repository\PersonRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrinePersonRepository implements PersonRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Person $person): void
    {
        $this->entityManager->persist($person);
        $this->entityManager->flush();
    }
}