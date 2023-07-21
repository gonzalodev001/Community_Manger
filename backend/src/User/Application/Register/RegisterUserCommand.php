<?php

declare(strict_types=1);

namespace App\User\Application\Register;

use App\Shared\Domain\Bus\Command\Command;

class RegisterUserCommand implements Command
{
    public function __construct(
        private readonly string $id, 
        private readonly string $email, 
        private readonly string $password, 
        private readonly string $passwordConfirmed, 
        private readonly string $communityId
    )
    {
        
    }

    public function id(): string
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function passwordConfirmed(): string
    {
        return $this->passwordConfirmed;
    }

    public function communityId(): string
    {
        return $this->communityId;
    }
}