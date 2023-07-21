<?php

namespace App\User\Application\Register;

use App\Shared\Domain\Bus\Event\EventBus;
use App\Shared\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Aggregate\User;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\ValueObject\Password;

class RegisterUser
{
    public function __construct(private UserRepository $userRepository, private EventBus $eventBus)
    {

    }

    public function __invoke(Uuid $id, Email $email, Password $password, Password $passwordConfirmed, Uuid $communityId): string
    {
        $user = User::registerUser($id, $email, $password, $passwordConfirmed, $communityId);
        
        $userId = $this->userRepository->save($user);
        $this->eventBus->publish(...$user->pullDomainEvents());
        
        return $userId;
    }
}