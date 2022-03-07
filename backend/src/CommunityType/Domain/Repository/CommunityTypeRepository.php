<?php

namespace App\CommunityType\Domain\Repository;

use App\CommunityType\Domain\Aggregate\CommunityType;

interface CommunityTypeRepository
{
    public function save(CommunityType $communityType): void;
}