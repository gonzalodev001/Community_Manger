<?php

declare(strict_types=1);

namespace App\CommunityType\Application\Register;

use App\Shared\Domain\Bus\Command\Command;

class RegisterCommunityTypeCommand implements Command
{
    public function __construct(private readonly string $id, private readonly string $name)
    {

    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}