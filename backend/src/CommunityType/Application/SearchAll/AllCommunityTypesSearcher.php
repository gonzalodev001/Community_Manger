<?php

declare(strict_types=1);

namespace App\CommunityType\Application\SearchAll;

use App\CommunityType\Application\CommunityTypeResponse;
use App\CommunityType\Application\CommunityTypesResponse;
use App\CommunityType\Domain\Aggregate\CommunityType;
use App\CommunityType\Domain\Repository\CommunityTypeRepository;

use function Lambdish\Phunctional\map;

class AllCommunityTypesSearcher
{
    public function __construct(private readonly CommunityTypeRepository $repository)
    {
        
    }

    public function searchAll(): CommunityTypesResponse
    {
        return new CommunityTypesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    public function toResponse(): callable
    {
        return static fn (CommunityType $communityType) => new CommunityTypeResponse(
            $communityType->getId(),
            $communityType->getName()
        );
    }
}