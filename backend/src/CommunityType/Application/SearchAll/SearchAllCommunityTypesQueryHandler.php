<?php

declare(strict_types=1);

namespace App\CommunityType\Application\SearchAll;

use App\CommunityType\Application\CommunityTypesResponse;
use App\Shared\Domain\Bus\Query\QueryHandler;

class SearchAllCommunityTypesQueryHandler implements QueryHandler
{
    public function __construct(private readonly AllCommunityTypesSearcher $searcher)
    {
    }

    public function __invoke(SearchAllCommunityTypesQuery $query): CommunityTypesResponse
    {
        return $this->searcher->searchAll();
    }
}