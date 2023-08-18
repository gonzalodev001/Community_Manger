<?php

declare(strict_types=1);

namespace App\Community\Application\Search;

use App\CommunityType\Application\CommunitiesResponse;
use App\Shared\Domain\Bus\Query\QueryHandler;

class SearchCommunityByCifQueryHandler implements QueryHandler
{
    public function __construct(private readonly CommunityByCifSearcher $searcher)
    {
        
    }

    public function __invoke(SearchCommunityByCifQuery $query): CommunitiesResponse
    {
        return $this->searcher->searchByCif($query->cif());
    }   
}