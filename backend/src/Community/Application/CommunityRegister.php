<?php

namespace App\Community\Application;

use App\Community\Domain\Aggregate\Community;
use App\Community\Domain\Repository\CommunityRepository;

class CommunityRegister
{
    public function __construct(private CommunityRepository $repository)
    {
    }

    public function __invoke(string $id, string $address, string $municipality, string $communityTypeId): void
    {
        $community = Community::registerCommunity($id, $address, $municipality, $communityTypeId);
        $this->repository->save($community);
    }
}