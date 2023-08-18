<?php

declare(strict_types=1);

namespace App\Community\Application\Register;

use App\Shared\Domain\Bus\Command\CommandHandler;

class RegisterCommunityCommandHandler implements CommandHandler
{
    public function __construct(private readonly CommunityRegister $communityRegister)
    {
        
    }

    public function __invoke(RegisterCommunityCommand $command)
    {
        $this->communityRegister->__invoke(
            $command->id(), 
            $command->address(), 
            $command->municipality(), 
            $command->communityTypeId(), 
            $command->associationId());
    }
}