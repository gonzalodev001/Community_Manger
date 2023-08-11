<?php

namespace App\CommunityType\Application\Register;

use App\CommunityType\Domain\Aggregate\CommunityType;
use App\CommunityType\Domain\Repository\CommunityTypeRepository;
use App\Shared\Domain\ValueObject\Uuid;

class RegisterCommunityType
{
    public function __construct(private CommunityTypeRepository $repository)
    {
    }

    public function __invoke(string $id, string $name): void
    {
        $uid = new Uuid($id);
        $communityType = CommunityType::registerCommunityType($uid->value(), $name);

        $this->repository->save($communityType);
    }
}