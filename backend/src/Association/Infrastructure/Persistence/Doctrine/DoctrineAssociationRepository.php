<?php


namespace App\Association\Infrastructure\Persistence\Doctrine;


use App\Association\Domain\Aggregate\Association;
use App\Association\Domain\Repository\AssociationRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineAssociationRepository implements AssociationRepository
{

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Association $association): void
    {
        $this->entityManager->persist($association);
        $this->entityManager->flush();
    }
}