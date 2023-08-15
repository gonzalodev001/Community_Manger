<?php

declare(strict_types=1);

namespace App\Community\Application\Register;

use App\Shared\Domain\Bus\Command\Command;

class RegisterCommunityCommand implements Command
{
    public function __construct(
        private readonly string $id, 
        private readonly string $address, 
        private readonly string $municipality, 
        private readonly string $communityTypeId, 
        private readonly string $associationId
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
}