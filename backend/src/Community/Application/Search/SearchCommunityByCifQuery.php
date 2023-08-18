<?php

declare(strict_types=1);

namespace App\Community\Application\Search;

use App\Shared\Domain\Bus\Query\Query;

class SearchCommunityByCifQuery implements Query
{
    public function __construct(private readonly string $cif)
    {
        
    }

    public function cif(): string
    {
        return $this->cif;
    }
}