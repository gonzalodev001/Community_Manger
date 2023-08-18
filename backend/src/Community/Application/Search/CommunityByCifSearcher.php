<?php

declare(strict_types=1);

namespace App\Community\Application\Search;

use App\Community\Domain\Aggregate\Community;
use App\Community\Domain\Repository\CommunityRepository;
use App\CommunityType\Application\CommunitiesResponse;
use App\CommunityType\Application\CommunityResponse;

use function Lambdish\Phunctional\map;

class CommunityByCifSearcher 
{
    public function __construct(private readonly CommunityRepository $repository)
    {
        
    }

    public function searchByCif(string $cif): CommunitiesResponse
    {
        return new CommunitiesResponse(...map($this->toResponse(), $this->repository->findByCif($cif)));
    }

    public function toResponse(): callable
    {
        return static fn(Community $community) => new CommunityResponse(
            $community->getId(),
            $community->getAddress(),
            $community->getMunicipality(),
            $community->getCommunityTypeId(),
            $community->getAssociationId(),
            $community->getCif()
        );
    }
}