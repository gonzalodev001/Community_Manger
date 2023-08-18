<?php

declare(strict_types=1);

namespace App\CommunityType\Application;

use App\Shared\Domain\Bus\Query\Response;

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