<?php


namespace App\User\Application;


use App\User\Domain\Repository\UserRepository;

class GetUserUseCase
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke()
    {
        // TODO: Implement __invoke() method.
    }
}