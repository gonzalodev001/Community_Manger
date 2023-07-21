<?php


namespace App\Person\Application\Register;


use App\Person\Domain\Aggregate\Person;
use App\Person\Domain\Repository\PersonRepository;

class RegisterPerson
{

    public function __construct(private PersonRepository $repository)
    {
    }

    public function __invoke(string $id, string $firstName, string $lastName, string $document, string $phone): void
    {
        $person = Person::registerPerson($id, $firstName, $lastName, $document, $phone);

        $this->repository->save($person);
    }
}