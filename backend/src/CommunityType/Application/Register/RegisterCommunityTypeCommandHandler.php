<?php
declare(strict_types=1);

namespace App\CommunityType\Application\Register;

use App\Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommunityTypeCommandHandler implements CommandHandler
{
    public function __construct(private readonly RegisterCommunityType $registerCommunityType) 
    {
        
    }

    public function __invoke(RegisterCommunityTypeCommand $command): void
    {
        $this->registerCommunityType->__invoke($command->id(), $command->name());
    }
}