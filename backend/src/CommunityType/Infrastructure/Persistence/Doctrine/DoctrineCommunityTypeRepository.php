<?php


namespace App\CommunityType\Infrastructure\Persistence\Doctrine;


use App\CommunityType\Domain\Aggregate\CommunityType;
use App\CommunityType\Domain\Repository\CommunityTypeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineCommunityTypeRepository implements CommunityTypeRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(CommunityType $communityType): void
    {
        $this->entityManager->persist($communityType);
        $this->entityManager->flush();
    }
}