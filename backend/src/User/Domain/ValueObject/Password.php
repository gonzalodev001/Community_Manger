<?php

namespace App\User\Domain\ValueObject;


use App\User\Domain\Exceptions\InvalidPassword;

class Password
{
    const pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    public function __construct(private string $password)
    {
        self::validatePassword($password);
    }

    public function password(): string
    {
        return $this->password;
    }

    public static function validatePassword(string $password): void
    {
        if (!preg_match(self::pattern, $password)) {
            throw new InvalidPassword($password);
        }
    }

    public function hashed(string $pass): void
    {
        $this->password = $pass;
    }
}