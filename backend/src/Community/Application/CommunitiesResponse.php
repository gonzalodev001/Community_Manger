<?php

declare(strict_types=1);

namespace App\Community\Application;

use App\Shared\Domain\Bus\Query\Response;
use App\CommunityType\Application\CommunityResponse;

class CommunitiesResponse implements Response
{
    private readonly array $communities;

    public function __construct(CommunityResponse ...$communities)
    {
        $this->communities = $communities;
    }

    public function communities(): array
    {
        return $this->communities;
    }
}