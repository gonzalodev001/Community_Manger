<?php


namespace App\Community\Infrastructure\Persistence\Doctrine;


use App\Community\Domain\Aggregate\Community;
use App\Community\Domain\Repository\CommunityRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineCommunityRepository implements CommunityRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Community $community): void
    {
        $this->entityManager->persist($community);
        $this->entityManager->flush();
    }
}