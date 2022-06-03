<?php


namespace App\Person\Domain\Repository;


use App\Person\Domain\Aggregate\Person;

interface PersonRepository
{
    public function save(Person $person): void;
}