<?php


namespace App\User\Domain\Exceptions;


use App\Shared\Domain\Error\DomainError;

class InvalidPasswordUser extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'invalid_credentials';
    }

    public function errorMessage(): string
    {
        return sprintf('The credentials provided is invalid.');
    }
}