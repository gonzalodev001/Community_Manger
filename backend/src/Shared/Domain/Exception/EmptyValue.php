<?php

namespace App\Shared\Domain\Exception;



use App\Shared\Domain\Error\DomainError;

class EmptyValue extends DomainError
{

    public function __construct(private string $type)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'empty_'.$this->type;
    }

    public function errorMessage(): string
    {
        return sprintf('The '.$this->type.' provided is empty');
    }
}