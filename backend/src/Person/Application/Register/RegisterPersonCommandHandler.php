<?php

declare(strict_types=1);

namespace App\Person\Application\Register;

use App\Person\Application\Register\RegisterPerson;
use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;

class RegisterPersonCommandHandler implements CommandHandler
{
    public function __construct(private RegisterPerson $registerPerson)
    {
        
    }

    public function __invoke(RegisterPersonCommand $command): void
    {
        $id = new Uuid($command->id());

        $this->registerPerson->__invoke($command->id(), $command->firstName(), $command->lastName(), $command->document(), $command->phone());
    }
}