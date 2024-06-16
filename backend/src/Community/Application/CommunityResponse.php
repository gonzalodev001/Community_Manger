<?php

declare(strict_types=1);

namespace App\Community\Application;

class CommunityResponse
{
    public function __construct(
        private readonly string $id,
        private readonly string $address,
        private readonly string $municipality,
        private readonly string $communityTypeId,
        private readonly string $associationId,
        private readonly string $cif

    )
    {
        
    }

    public function id(): string
    {
        return $this->id;
    }

    public function address(): string
    {
        return $this->address;
    }

    public function municipality(): string
    {
        return $this->municipality;
    }

    public function communityTypeId(): string
    {
        return $this->communityTypeId;
    }

    public function associationId(): string
    {
        return $this->associationId;
    }
    
    public function cif(): string
    {
        return $this->cif;
    }
    
}