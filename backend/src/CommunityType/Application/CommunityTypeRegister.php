<?php

namespace App\CommunityType\Application;

use App\CommunityType\Domain\Aggregate\CommunityType;
use App\CommunityType\Domain\Repository\CommunityTypeRepository;
use App\Shared\Domain\ValueObject\Uuid;

class CommunityTypeRegister
{
    public function __construct(private CommunityTypeRepository $repository)
    {
    }

    public function __invoke(string $id, string $name): void
    {
        //$id = new Uuid($id);
        $communityType = CommunityType::registerCommunityType($id, $name);

        $this->repository->save($communityType);
    }
}