<?php


namespace App\Shared\Domain\Error;


use DomainException;

abstract class DomainError extends DomainException
{

    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract public function errorCode(): string;

    abstract public function errorMessage(): string;
}