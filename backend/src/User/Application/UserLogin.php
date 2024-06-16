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
        $user = $this->repository->findUser($username);
        return $user;
        //$user->Login($password); // Debería comprobar que la password es correcta y el usuario la entidad de domino User??
    }
}