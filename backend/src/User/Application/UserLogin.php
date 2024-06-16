<?php


namespace App\User\Application;


use App\User\Domain\Repository\UserRepository;

class UserLogin
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $username, string $password)
    {
        $user = $this->repository->findUser($username, $password);
        return $user;
    }
}