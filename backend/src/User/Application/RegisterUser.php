<?php

namespace App\User\Application;

use App\Shared\Domain\ValueObject\Email;
use App\Shared\Domain\ValueObject\Uuid;
use App\User\Domain\Aggregate\User;
use App\User\Domain\Repository\UserRepository;
use App\User\Domain\ValueObject\Password;

class RegisterUser
{
    public function __construct(private UserRepository $userRepository)
    {

    }

    public function __invoke(string $id, string $email, string $password, string $confirmpassword, string $communityId): string
    {
        $id = new Uuid($id);
        $email = new Email($email);
        $password = new Password($password);
        $confirmPassword = new Password($confirmpassword);
        $communityId = new Uuid($communityId);
        $user = User::registerUser($id, $email, $password, $confirmPassword, $communityId);

        return $this->userRepository->save($user);
    }
}