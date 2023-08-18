<?php

declare(strict_types=1);

namespace App\CommunityType\Application;

use App\Shared\Domain\Bus\Query\Response;

class CommunityTypesResponse implements Response
{
    private readonly array $communityTypes;

    public function __construct(CommunityTypeResponse ...$communityTypes)
    {
        $this->communityTypes = $communityTypes;
    }

    public function communityTypes(): array
    {
        return $this->communityTypes;
    }
}