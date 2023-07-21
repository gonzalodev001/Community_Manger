<?php

declare(strict_types=1);

namespace App\User\Application\Register;

use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\ValueObject\Password;

class RegisterUserCommandHandler implements CommandHandler
{
    public function __construct(private readonly RegisterUser $registerUser)
    {
        
    }

    public function __invoke(RegisterUserCommand $command): void
    {
        $id = new Uuid($command->id());
        $email = new Email($command->email());
        $password = new Password($command->password());
        $confirmPassword = new Password($command->passwordConfirmed());
        $communityId = new Uuid($command->communityId());

        $this->registerUser->__invoke($id, $email, $password, $confirmPassword, $communityId);
    }
}