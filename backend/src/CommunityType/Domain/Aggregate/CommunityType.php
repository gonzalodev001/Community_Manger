<?php

namespace App\CommunityType\Domain\Aggregate;

use App\Shared\Domain\Exception\EmptyValue;
use App\Shared\Domain\ValueObject\Uuid;

class CommunityType
{
    //private Uuid $id;
    private string $id;
    private string $name;

    private function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public static function registerCommunityType(string $id, string $name): self
    {
        self::validateName($name);
        return  new self($id, $name);
    }

    public static function validateName(string $name): void
    {
        if(empty($name)) {
            throw new EmptyValue($name);
        }
    }

}