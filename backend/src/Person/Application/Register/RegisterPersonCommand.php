<?php

declare(strict_types=1);

namespace App\Person\Application\Register;

use App\Shared\Domain\Bus\Command\Command;

class RegisterPersonCommand implements Command
{
    public function __construct(
        private string $id,
        private string $firstName,
        private string $lastName,
        private string $document,
        private string $phone,
    )
    {

    }

    public function id(): string
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function document(): string
    {
        return $this->document;
    }

    public function phone(): string
    {
        return $this->phone;
    }

}