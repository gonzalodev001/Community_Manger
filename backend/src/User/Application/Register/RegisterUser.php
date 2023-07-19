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

    public function __invoke(string $id, string $email, string $password, string $passwordConfirmed, string $communityId): string
    {
        $id = new Uuid($id);
        $email = new Email($email);
        $password = new Password($password);
        $confirmPassword = new Password($passwordConfirmed);
        $communityId = new Uuid($communityId);
        $user = User::registerUser($id, $email, $password, $confirmPassword, $communityId);
        
        $userId = $this->userRepository->save($user);
        $this->eventBus->publish(...$user->pullDomainEvents());
        
        return $userId;
    }
}