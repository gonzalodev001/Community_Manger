<?php


namespace App\Shared\Domain\ValueObject;


use App\Shared\Domain\Exception\InvalidEmail;

class Email
{

    public function __construct(private string $email)
    {
        self::ensureIsValue($this->email);
    }

    public function email(): string
    {
        return $this->email;
    }

    public static function ensureIsValue(string $email): void
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmail($email);
        }
    }
}